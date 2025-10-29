<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Carbon\Carbon;
Use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
       return view('index');
    }

    public function shop(){
        return view('client.pages.shop');
    }
    public function dashboard(){

            $totalSessions = DB::table('page_views')
                ->select('session_id')
                ->distinct()
                ->count();
    
            $singlePageSessions = DB::table('page_views')
                ->select('session_id')
                ->groupBy('session_id')
                ->havingRaw('COUNT(*) = 1')
                ->count();
    
            $bounceRate = $totalSessions > 0
                ? ($singlePageSessions / $totalSessions) * 100
                : 0;
    
            // return response()->json([
            //     'total_sessions' => $totalSessions,
            //     'single_page_sessions' => $singlePageSessions,
            //     'bounce_rate' => round($bounceRate, 2) . '%',
            // ]);
        return view('admin.index',compact('bounceRate'));
    }
    public function contact(){
        return view('client.pages.contact');
    }
    public function about(){
        return view('client.pages.about');
    }

    public function viewProduct(){
        $product = Products::paginate(4);
        return view('admin.pages.viewProduct',compact('product'));
    }

    public function addProduct(){
        return view('admin.pages.addProduct');
    }
   
    public function details($id){
        $pro = Products::find($id);

        $relatedProducts = Products::where('category', $pro->category)->where('id', '!=', $pro->id) 
            ->orderBy('created_at', 'desc')  
            ->take(4)  
            ->get();
        return view('client.pages.productDetails',compact('relatedProducts','pro'));
    }

    public function searchresults(Request $request) {
        // Get the search query from the request
        $query = $request->input('q'); 
    
        // Get the authenticated user's ID
        $userid = auth()->id(); 
    
        // Check if a user is authenticated before counting cart items
        $count = $userid ? Cart::where('user_id', $userid)->count() : 0;
    
        // Fetch distinct categories from the Products model
        $categories = Products::select('category')->distinct()->get();
    
        // Determine the products to display based on the search query
        if ($query) {
            // Search for items that match the query in name or category
            $products = Products::where('name', 'LIKE', "%{$query}%")
                ->orWhere('category', 'LIKE', "%{$query}%")
                ->paginate(12);
        } else {
            // Default behavior if no query is provided
            $products = Products::paginate(12);
        }
    
        // Return the view with the results
        return view('client.pages.searchresults', compact('products', 'categories', 'count'));
    }
    
}

