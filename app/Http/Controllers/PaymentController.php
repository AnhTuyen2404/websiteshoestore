<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;

class PaymentController extends Controller
{
    public function ShowCheckout(){
        if(Cart::total(0) ==0){
            Alert::warning('Lỗi !','Giỏ hàng chưa có sản phẩm');
            return Redirect::to('/show-cart');
        }
        $id = Session::get('customer');
        $data_customer = DB::table('customer')->where('customer_id', $id)->get();
        $city = City::orderby('matp','ASC')->get();
        return view('client.checkout')->with('data_customer',$data_customer)->with('city',$city);
    }
    public function selectDeliveryHome(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as  $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as  $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
    public function calculateFee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                     foreach($feeship as $fee){
                        Session::put('fee',$fee->fee_price);
                        Session::save();
                    }
                }else{ 
                    Session::put('fee',50000);
                    Session::save();
                }
            }
           
        }
    }
    public function saveCheckout(Request $request){
    	// $data = array();
    	// $data['shipping_name'] = $request->shipping_name;
    	// $data['shipping_phone'] = $request->shipping_phone;
    	// $data['shipping_email'] = $request->shipping_email;
    	// $data['shipping_address'] = $request->shipping_address;
        // $data['customer_id'] = $request->customer_id;
        // $data['payment_method'] = $request->payment;
    	// $shipping_id = DB::table('shipping')->insertGetId($data);

    	// Session::put('shipping_id',$shipping_id);
    	// Alert::warning('Success !','Added delivery address successfully');
    	// return Redirect::to('/payment');
        $tongtien = $request->all();
        return $tongtien;
    }
    public function Payment(Request $request){
        if($request->shipping_name =="" || $request->shipping_email =="" || $request->shipping_phone == "" || $request->shipping_address ==""  ){
            Alert::warning('Thông Báo!','Chưa nhập đủ thông tin !');
        }else{
            $data_shipping = array();
            $data_shipping['shipping_name'] = $request->shipping_name ;
            $data_shipping['shipping_phone']= $request->shipping_phone ;
            $data_shipping['shipping_address'] = $request->shipping_address;
            $data_shipping['shipping_email'] =$request->shipping_email;
            $data_shipping['customer_id'] =$request->customer_id;
            $shiping_id = DB::table('shipping')->insertGetId($data_shipping);

            $data_order=array();
            $data_order['shipping_id'] = $shiping_id ;
            $data_order['order_state'] = 'Pending';
            $data_order['payment_methods'] = $request->payment;
            $data_order['total_bill'] = $request->total;
            $data_order['create_date']= Carbon::now();
            $data_order['customer_id'] =$request->customer_id;
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
                $data_oder_dt['discount']= $request->discount;
                $data_oder_dt['product_size']= $v_content->options->size;
                $oder_detail = DB::table('order_details')->insert($data_oder_dt);        
            }
            Cart::destroy($Order_id);
            Alert::success('Thông Báo!','Đặt hàng thành công !',);
            return Redirect::to('/');

        }
    }
}
