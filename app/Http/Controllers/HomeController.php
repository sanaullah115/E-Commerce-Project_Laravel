<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  

  public function index(Request $request) {
    $products = Product::all();
    $products_four = Product::paginate(4); // Har page par 4 products

    if ($request->ajax() && $request->action == "search-product") {
        $products_four = Product::where('sub_category_id', $request->sub_cat_id)->paginate(4);
    } elseif ($request->action == "load-all-products") {
        // "All Products" par click hone par sab products load karna
        $products_four = Product::paginate(4);
    }

    $data['Sub_Category'] = Sub_Category::all();
    $data['products_four'] = $products_four;
    $data['products'] = $products;

    if ($request->ajax()) {
        return view('front_product')->with($data);
    }

    return view('index')->with($data);
}



  public function shop(Request $request)
  {
    $perPage=2;
    $products = Product::paginate($perPage);
    if ($request->ajax()) {
      if ($request->sub_cat_id) {
        $products = Product::where('sub_category_id', $request->sub_cat_id)->paginate(9);
      }

      if ($request->cat_id) {
        $products = Product::where('category_id', $request->cat_id)->paginate(9);
      }

      if ($request->range) {
        $products = Product::where('price','<=', $request->range)->paginate(9);
      }
    }
    $data['Category'] = Category::all();
    $data['Sub_Category'] = Sub_Category::all();
    $data['products'] = $products;
    $data['perPage'] = $perPage;
    if ($request->ajax()) {
      return view('shop_product')->with($data);
    }
    return view('shop')->with($data);
  }
}
