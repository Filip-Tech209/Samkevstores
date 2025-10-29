<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Payments;
use Stripe\Stripe;
use Stripe\Charge;
Use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $ordductId){
        
        $quantity = $request->input('quantity', 1);

        if (auth()->check()) {
            // Logged-in user
            $cart = Cart::updateOrCreate(
                ['user_id' => auth()->id(), 'product_id' => $ordductId],
                ['quantity' => DB::raw("quantity + $quantity")]
            );
        } else {
            // Guest user
            $sessionId = session()->getId();
            $cart = Cart::updateOrCreate(
                ['session_id' => $sessionId, 'product_id' => $ordductId],
                ['quantity' => DB::raw("quantity + $quantity")]
            );
        }

        return redirect('view-cart')->with('success', 'Item added to cart')->with('cart', $cart);

    }

   
    public function removeFromCart($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    public function viewCart() {
        if (auth()->check()) {
            $userid = auth()->id(); // Logged in user
        } else {
            $userid = session()->getId(); // Session ID for non-logged-in users
        }
    
        // Count the number of items in the cart count 
        $count = Cart::where('user_id', $userid)->orWhere('session_id', $userid)->count();
    
        // Fetch cart items with their details and calculate total price per item
        $cartItems = Cart::where('user_id', $userid)
                         ->orWhere('session_id', $userid) 
                         ->join('products', 'carts.product_id', '=', 'products.id')
                         ->select(
                             'carts.quantity as cart_quantity',
                             'products.*',
                             DB::raw('(carts.quantity * products.price) as total_price')
                         )
                         ->get();
    
        // Calculate the total price for all items in the cart
        $subtotal = $cartItems->sum('total_price');
        $tax = (15/100 * $subtotal);
        $totalCartPrice =($subtotal+$tax);

    
        // Fetch all cart data for the user
        $data2 = Cart::select('*')->where('user_id', $userid)
                     ->orWhere('session_id', $userid) // Include session_id for non-logged-in users
                     ->get();
    
        // Return the cart view with necessary data
        return view('client.pages.cart', compact('count', 'cartItems', 'data2', 'totalCartPrice','subtotal','tax'));
    }

    public function checkout(){
        
      
        if (!auth()->check()) {

            return redirect('login')->with('error', 'You need to log in to view your cart.');
        }
    
        // Use the authenticated user's ID if $id is not provided
        $userid = $id ?? auth()->id();
        $user = auth()->user();
    
        // Count the number of items in the cart
        $count = Cart::where('user_id', $userid)->count();
    
        // Fetch cart items with their details and calculate total price per item
        $cartItems = Cart::where('user_id', $userid)
                         ->join('products', 'carts.product_id', '=', 'products.id')
                         ->select(
                             'carts.quantity as cart_quantity',
                             'products.*',
                             DB::raw('(carts.quantity * products.price) as total_price')
                         )
                         ->get();
    
        // Calculate the total price for all items in the cart
        
        $subtotal = $cartItems->sum('total_price');
        $tax = (15/100 * $subtotal);
        $totalCartPrice =($subtotal+$tax);
    
        // Fetch all cart data for the user
        $data2 = Cart::select('*')->where('user_id', $userid)
                     ->orWhere('session_id', $userid) // Include session_id for non-logged-in users
                     ->get();
    
        // Return the cart view

        return view('client.pages.checkout', compact('count', 'cartItems', 'data2', 'totalCartPrice','user','subtotal','tax'));
        
    }
  

    public function placeOrder(Request $request)
    {
        $userid = auth()->id();
    
        // Fetch cart items and calculate subtotal
        $cartItemDetails = Cart::where('carts.user_id', $userid)
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select(
                'carts.quantity as cart_quantity',
                'products.*',
                DB::raw('(carts.quantity * products.price) as total_price')
            )->get();
    
        $subtotal = $cartItemDetails->sum('total_price');
        $tax = (15 / 100 * $subtotal);
        $totalCartPrice = ($subtotal + $tax);
    
        try {
            // Create the order
            $order = Order::create([
                'user_id' => $userid,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'country' => $request->country,
                'contact_number' => $request->phone,
                'email' => $request->email,
                'tax_amount' => $tax,
                'total_amount' => $totalCartPrice,
                'shipping_fee' => $request->shippingfee,
                'shipping_address' => $request->address,
                'payment_method' => 'stripe',
                'currency' => 'AED',
                'payment_status' => 'pending',
            ]);
    
            // Simulate payment (example for now)
            $payment = Payments::create([
                'order_id' => $order->id,
                'method' => 'stripe',
                'status' => 'success', // Simulate successful payment
                'transaction_id' => 'SIM-' . strtoupper(uniqid()),
            ]);
    
            // Update order payment status
            $order->update([
                'payment_status' => $payment->status,
            ]);
    
            return redirect('pay')->with('success', 'Order placed successfully! Please Fill Card Details to make payment.');

        } catch (\Exception $e) {
            // Redirect to an error page
            return redirect()->back()->with([
                'error' => 'Failed to place order. Please try again.',
            ]);
        }
        
    }
    
    public function pay(){
        if(Auth::check()){
            $userid = $id ?? auth()->id();
            $user = auth()->user();
            $count = Cart::where('user_id', $userid)->count();
            $cartItems = Cart::where('user_id', $userid)
                            ->join('products', 'carts.product_id', '=', 'products.id')
                            ->select(
                                'carts.quantity as cart_quantity',
                                'products.*',
                                DB::raw('(carts.quantity * products.price) as total_price')
                            )
                            ->get();
            
            $subtotal = $cartItems->sum('total_price');
            $tax = (15/100 * $subtotal);
            $totalCartPrice =($subtotal+$tax);

            $data2 = Cart::select('*')->where('user_id', $userid)
                        ->orWhere('session_id', $userid)
                        ->get();
            $order = Order::select('*')->where('user_id', $userid)->first();
            $quantity = Cart::select('*')->where('user_id',$userid)->first();

            return view('client.pages.pay',compact('count', 'cartItems', 'data2', 'totalCartPrice','user','subtotal','tax','order','quantity'));
            }else{
                return redirect('login')->with('error', 'You must be logged in to proceed with the payment.');
            }
    }

    public function paymentMethod($orderId) {
        $items= Products::paginate(12);
        $categories = Products::select('category')->distinct()->get();
        $userid = Auth::id();
        $count = Cart::where('user_id',$userid)->count();
        
        $order = Order::find($orderid);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Show a view to select the payment method
        return view('pages.paymentMethod', compact('order', 'items', 'categories', 'count'));
    }
    
    public function processStripePayment(Request $request, $orderId) {
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a Stripe Payment Intent
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $order->total_price * 100, // Convert to cents
                'currency' => 'usd', // Adjust currency if needed
                'description' => 'Order #' . $order->id,
            ]);

            // Update order status to processing after successful payment
            $order->update(['status' => 'processing']);

            // Clear the cart after successful payment
            Cart::where('userid', $order->user_id)->delete();

            return redirect()->back()->with('success', 'Payment successful! Your order is being processed.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed, Please Check your internet conncetion or contact Support' );
        }
    }

    public function viewOrder(){
        $order = Order::paginate(15);
        return view('admin.pages.viewOrder',compact('order'));
    }

    public function deleteOrder(string $id){
        $ord = Order::find($id);

        if ($ord) {

            $ord->delete();

            return redirect('view-order')->with('success', 'Deleted successfully');
        } else {
            return redirect('view-order')->with('error', 'Order Id not found');
        }


    }



}

    
// . $e->getMessage()