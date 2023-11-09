<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

}
