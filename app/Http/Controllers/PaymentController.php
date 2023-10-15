<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;



class PaymentController extends Controller
{
    public function ShowCheckout(){
        if(Cart::total(0) ==0){
            Alert::warning('Lỗi !','Giỏ hàng chưa có sản phẩm');
            return Redirect::to('/show-cart');
        }
        return view('client.checkout');
    }
    public function Payment(Request $request){
        if($request->ho =="" || $request->ten =="" || $request->email == "" || $request->sdt =="" || $request->sonha == ""||$request->tinh ==""||$request->huyen==""||$request->xa==""  ){
            Alert::warning('Thông Báo!','Chưa nhập đủ thông tin !');
            return Redirect::to('/checkout');
        }else{
            $data_shipping = array();
            $data_shipping['shipping_name'] = $request->ho .' '. $request->ten ;
            $data_shipping['shipping_phone']= $request->sdt ;
            $data_shipping['shipping_address'] = $request->sonha.','.$request->xa.','.$request->huyen.','.$request->tinh;
            $data_shipping['shipping_email'] =$request->email;
            $shiping_id = DB::table('shipping')->insertGetId($data_shipping);

            $data_order=array();
            $data_order['shipping_id'] = $shiping_id ;
            $data_order['order_state'] = 'Chờ xác nhận';
            $data_order['payment_methods'] = $request->payment;
            $data_order['total_bill'] = Cart::total(0,',','');
            $data_order['create_date']= Carbon::now();
            
            $Order_id = DB::table('order')->insertGetId($data_order);
            $content = Cart::content();

            foreach($content as $v_content){
                $data_oder_dt = array();
                $data_oder_dt['order_id'] =  $Order_id;
                $data_oder_dt['product_id']= $v_content->id;
                $data_oder_dt['product_name']= $v_content->name;
                $data_oder_dt['product_price']= $v_content->price;
                $data_oder_dt['product_img']= $v_content->options->image;
                $data_oder_dt['product_quantity']= $v_content->qty;
                $oder_detail = DB::table('order_details')->insert($data_oder_dt);        
            }

            Alert::success('Thông Báo!','Đặt hàng thành công !',);
            return Redirect::to('/');

        }
    }
}
