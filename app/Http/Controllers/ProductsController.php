<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $productall=Product::all();
        return view('admin.Products.list',compact('productall'));
    }



    public function create()
    {
        $category = Category::all();
        $Sub_Category = Sub_Category::all();
        return view('admin.Products.create', compact('Sub_Category', 'category'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->description;

        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('Upload/Product'), $imagename);
        $product->image = $imagename;
        $product->save();

        $product->image = $request->image;
        return redirect()->route('Products.list');
    }



    public function addCart(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->where('Product_id', $request->product_id)->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::id();//Auth::id(): Logged-in user ka ID le raha hai.
            $cart->Product_id = $request->product_id;
            $cart->save();
        }
        $cart_counter = Cart::where('user_id', Auth::id())->count();

        return response()->json(['success' => true, 'cart_counter' => $cart_counter, 'message' => 'Product added to cart successfully']);
    }
    public function cart(Request $request)
    {
        $cart_product = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('cart', compact('cart_product'));
    }



    public function updateCart(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->Quantity = $request->quantity;
        $cart->save();
        $cart_counter = Cart::where('user_id', Auth::id())->count();

        return response()->json(['success' => true, 'cart_counter' => $cart_counter,]);
    }



    public function removeCart(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->delete();
        $cart_counter = Cart::where('user_id', Auth::id())->count();

        return response()->json(['success' => true, 'cart_counter' => $cart_counter,]);
    }


    public function totalpayout(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();
        $totalpayout = 0;
        foreach ($carts as $cart) {
            $totalpayout=$totalpayout+($cart->Quantity*$cart->product->price);
        }
        return response()->json(['success' => true, 'totalpayout' => $totalpayout]);
    }


    public function checkout(Request $request)
    {
        $cart_product = Cart::where('user_id', Auth::id())->where('quantity','!=',0)->get();
        $totalpayout = 0;
        foreach ($cart_product as $cart) {
            $totalpayout=$totalpayout+($cart->Quantity*$cart->product->price);
        }
        return view('checkout', compact('cart_product','totalpayout'));
    }

    
}
