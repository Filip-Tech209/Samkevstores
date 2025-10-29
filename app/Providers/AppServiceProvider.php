<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use App\Models\Products;
use App\Models\Messages;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
     /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        $products = Products::latest('updated_at')->paginate(10);
        $oneWeekAgo = Carbon::now()->subWeek(); 
        $productslatest = Products::whereBetween('created_at', [$oneWeekAgo, Carbon::now()])->get();
        $categories = Products::select('category')->distinct()->get();
        $latest = Messages::latest()->paginate(5);
        $totalOrders = Order::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $totalUsers = User::all()->count();
        $totalProducts = Products::all()->count();
        $totalVisitors = DB::table('page_views') ->distinct('session_id')->count('session_id');
        $totalInbox = Messages::all()->count();

        if (auth()->check()) {
            $userid = auth()->id(); 
        } else {
            $userid = session()->getId(); 
        }

        if (!app()->runningInConsole()) {
            DB::table('page_views')->insert([
                'session_id' => session()->getId(),
                'url' => Request::fullUrl(),
                'created_at' => now(),
            ]);
        }

    
 
        $count = Cart::where('user_id', $userid)->orWhere('session_id', $userid)->count();
        $cartItems = Cart::where('user_id', $userid)
                         ->join('products', 'carts.product_id', '=', 'products.id')
                         ->select(
                             'carts.quantity as cart_quantity',
                             'products.*',
                             DB::raw('(carts.quantity * products.price) as total_price')
                         )
                         ->get();
    
 
        $totalCartPrice = $cartItems->sum('total_price');
    

        $data2 = Cart::select('*')->where('user_id', $userid)
                     ->orWhere('session_id', $userid) 
                     ->get();
    


        if (Auth::check()){
            $userid = Auth::id();
            View::share('products', $products);
            View::share('productslatest', $productslatest);
            View::share('categories', $categories);
            View::share('count', $count);
            View::share('cartItems', $cartItems);
            View::share('data2', $data2);
            View::share('latest', $latest);
            View::share('totalCartPrice', $totalCartPrice);
            View::share('totalOrders', $totalOrders);
            View::share('totalUsers', $totalUsers); 
            View::share('totalVisitors', $totalVisitors); 
            View::share('totalProducts', $totalProducts); 
            View::share('totalInbox', $totalInbox); 

        }else {

            View::share('products', $products);
            View::share('productslatest', $productslatest);
            View::share('categories', $categories);
            View::share('count', $count);
            View::share('cartItems', $cartItems);
            View::share('data2', $data2);
            View::share('latest', $latest);
            View::share('totalOrders', $totalOrders);
            View::share('totalUsers', $totalUsers);
            View::share('totalVisitors', $totalVisitors); 
            View::share('totalCartPrice', $totalCartPrice);
            View::share('totalProducts', $totalProducts); 
            View::share('totalInbox', $totalInbox); 

        }
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}

