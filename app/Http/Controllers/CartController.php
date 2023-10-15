<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function ShowCart(){
        return view('client.cart');

    }
    public function SaveCart(Request $request){
        $product_id = $request->product_id ;
        $quantity = $request->quantity ;
        $warehouse = DB::table('product')->where('product_id',$product_id)->get();
        foreach( $warehouse as $warehouse){
            $sl_kho =  $warehouse->quantity  ;
        }

        if($quantity >$sl_kho   ){
            Alert::warning('Chú ý','Số lượng sản phẩm trong kho không đủ ');
            return Redirect::to('/shop/');

        }else if($quantity == 0){
            Alert::warning('Chú ý','Số lượng sản phẩm phải lớn hơn 0  ');
            return Redirect::to('/shop/');
        }
        else{
            $info_product = DB::table('product')->where('product_id',$product_id)->get();
            foreach($info_product as $key => $item){
                $data['id']= $item->product_id;
                $data['qty']= $quantity;
                $data['name']= $item->product_name;
                $data['price']= $item->price;
                $data['weight']= "123";
                $data['options']['image']= $item->product_img;
             }
             Cart::setGlobalTax(1);
             Cart::add($data);
             return Redirect::to('/show-cart');
        }
    }
    public function DeleteCart($rowId){
        Cart::remove($rowId);
        Alert::success('Thông Báo!',' Đã xóa  !');
        return Redirect::to('/show-cart');
    }
    public function UpdateCart(Request $request){
        $quantity = array();
        $rowId=array();
        $quantity = $request->quantity;
        $rowId = $request->rowId;
    
        for($i=0;$i<=count($quantity)-1;$i++){
            Cart::update($rowId[$i],$quantity[$i]);
        }
        return Redirect::to('/show-cart');

    }
    public function AddOneCart($id){
        $info_product = DB::table('product')->where('product_id',$id)->get();
        foreach($info_product as $key => $item){
            $data['id']= $item->product_id;
            $data['qty']= 1;
            $data['name']= $item->product_name;
            $data['price']= $item->price;
            $data['weight']= "123";
            $data['options']['image']= $item->product_img;
         }
         Cart::add($data);
         return Redirect::to('/show-cart');
    }
}
