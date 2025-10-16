<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Orderdetail;
use App\Models\Setting;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Session;

class FrontController extends Controller
{
    public function frontPage()
    {
    	return view('layouts.front');
    }

	public function carts()
    {
        $carts = Cart::where('cart_session_id',Session::get('cart_session_id'))->latest()->get();
        return view('fronts.carts', compact('carts'));
    }

    public function productDetails($id)
    {
    	$product = Product::with([
		    'category',
		    'brand',
		    'productvariants' => function ($query) {
		        $query->whereNotNull('image');
		    },
            'reviews.user'
		])->findOrFail($id);


    	$variants = Variant::with(['productvariants' => function ($query) use ($id) {
	        $query->where('product_id', $id);
	    }])
	    ->whereHas('productvariants', function ($query) use ($id) {
	        $query->where('product_id', $id);
	    })
	    ->where('status', 'Active')
	    ->get();

	    $relatedProducts = Product::where('category_id',$product->category->id)->where('status','Active')->latest()->get();

    	return view('fronts.product_details', compact('product', 'variants','relatedProducts'));
    }

    public function productLists(Request $request)
    {
    	$query = Product::query();


	    if ($request->filled('category_id')) {
	        $query->where('category_id', $request->category_id);
	    }


	    if ($request->filled('brand_id')) {
	        $query->where('brand_id', $request->brand_id);
	    }

	    if ($request->filled('product_id')) {
	        $query->where('id', $request->product_id);
	    }

	    if ($request->filled('search_product')) {
	        $search = $request->search_product;
	        $query->where(function ($q) use ($search) {
	            $q->where('product_name', 'LIKE', "%{$search}%");
	        });
	    }

	    $products = $query->with('category')->latest()->paginate(4);

	    $products->appends($request->query());

	    $products->appends($request->only(['category_id', 'brand_id', 'product_id', 'search_product']));

	    return view('fronts.product_page', compact('products'));
    	//return view('fronts.product_page', compact('products'));
    }
    public function contact()
    {
        $setting = Setting::first();
        return view('fronts.contact-us', compact('setting'));
    }
    public function about()
    {
        $data = AboutUs::first();
        return view('fronts.about-us', compact('data'));
    }
    public function myAccount()
    {
        $userId = user()->id;
        // Orders (total, today, monthly, yearly)
        $totalOrders = OrderDetail::where('user_id', $userId)->count();

        $todayOrders = OrderDetail::where('user_id', $userId)
            ->whereDate('created_at', now())
            ->count();

        $monthlyOrders = OrderDetail::where('user_id', $userId)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $orders = Orderdetail::with('orders.product')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('fronts.my-account', compact(
            'totalOrders',
            'todayOrders',
            'monthlyOrders',
            'orders'
        ));
    }
    public function userChangePassword(Request $request)
    {
        try
        {
            $user = User::findorfail(Auth::user()->id);

            if (!Hash::check($request->current_password, $user->password)) {

                $notification=array(
                    'messege' => 'The current password is not matched',
                    'alert-type' => 'error'
                );

                return redirect()->route('home')->with($notification);
            }

            if ($request->new_password !== $request->confirm_password) {

                $notification=array(
                    'messege' => 'The new & confirm password are not matched',
                    'alert-type' => 'error'
                );

                return redirect()->route('home')->with($notification);
            }

            $user->password = Hash::make($request->new_password);
            $user->update();


            $notification=array(
                'messege' => 'Successfully your has been changed',
                'alert-type' => 'success'
            );

            return redirect()->route('home')->with($notification);

        } catch(Exception $e) {
            // Log the error
            Log::error('Error in changePassword: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            $notification=array(
                'messege' => 'Something went wrong!!!',
                'alert-type' => 'error'
            );

            return redirect()->route('home')->with($notification);
        }
    }
    public function searchSuggestions(Request $request)
    {
        $keyword = $request->get('q', '');

        if (!$keyword) {
            return response()->json([]);
        }

        $products = Product::where('product_name', 'LIKE', "%{$keyword}%")
            ->select('id', 'product_name')
            ->take(8)
            ->get();

        return response()->json($products);
    }

}
