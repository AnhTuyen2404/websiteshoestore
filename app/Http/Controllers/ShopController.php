<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\CategoryProduct;


class ShopController extends Controller
{
    public function GetAllProduct(){
        $AllProduct = DB::table('product')->where('product_state','show')->get();
        $AllCategory = DB::table('category')->where('category_state','show')->get();
        $Get3Product = DB::table('product')->limit(3)->get();
        return view('client.shop', compact('AllProduct','AllCategory','Get3Product'));
    }
    public function GetProduct_Category($id){
        $AllCategory = DB::table('category')->where('category_state','show')->get();
        $AllProduct = DB::table('product')->where('category_id',$id)->get();
        $Get3Product = DB::table('product')->limit(3)->get();
        return view('client.shop', compact('AllProduct','AllCategory','Get3Product'));
    }
    public function ProductDetails($id) {
        $ProductDetails = DB::table('product')->where('product_id', $id)->get();
        foreach($ProductDetails as $category_id){   
                $category_id = $category_id-> category_id ;
            }
        if ($ProductDetails) {
        $ProductSizes = DB::table('sizes')->where('product_id', $id)->get();  
        } 
        $RelateProduct = DB::table('product')->where('category_id', $category_id)->limit(4)->get();

    return view('client.productdetails', compact('ProductDetails', 'ProductSizes', 'RelateProduct'));

    }
    public function filterByCategory(Request $request, $slug_category_product)
    {
        // $products = Product::where('category_id', $categoryId)->get();
        // return response()->json($products);

        $category_by_slug =CategoryProduct::where('slug_category_product', $slug_category_product)->get();

        foreach($category_by_slug as $key => $cate){
            $category_id = $cate->category_id ;
        }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];

            if($sort_by == 'giam_dan'){
                $category_by_id = Product::with('category')->where('category_id', $category_id)
                ->orderBy('product_price','desc')->paginate(6)->append(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $category_by_id = Product::with('category')->where('category_id', $category_id)
                ->orderBy('product_price','asc')->paginate(6)->append(request()->query()); 
            }elseif($sort_by == 'kytu_za'){
                $category_by_id = Product::with('category')->where('category_id', $category_id)
                ->orderBy('product_name','desc')->paginate(6)->append(request()->query());
            }elseif($sort_by == 'kytu_az'){
                $category_by_id = Product::with('category')->where('category_id', $category_id)
                ->orderBy('product_name','asc')->paginate(6)->append(request()->query()); 
            }elseif(isset ($_GET['start_price'])&& $_GET['end_price']){
                $min_price = $_GET['start_price'];
                $max_price = $_GET['end_price'];

                $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])
                ->orderBy('product_id','asc')->paginate(6)->append(request()->query());
            }
            else{
                $category_by_id = Product::with('category')->where('category_id', $category_id)
                ->orderBy('product_id','desc')->paginate(6)->append(request()->query());
            }
        }
    }
}
