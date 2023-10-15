<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class WhishlistController extends Controller
{
    public function ShowWhishlist(){

        $customer_id = Session::get('customer_id');
        if(!isset($customer_id)){
        Alert::warning('Cảnh báo', 'Bạn chưa đăng nhập');
        return Redirect::to('/show-login');
        }else{
            $GetWhishlist = DB::table('whishlist')->where('customer_id', $customer_id)->join('product','whishlist.product_id','=','product.product_id')->get();
            return view('client.whishlist',compact('GetWhishlist'));
        }

        
    }
    public function AddWhishlist($id){
        $customer_id = Session::get('customer_id');
        if(!isset($customer_id)){
        Alert::warning('Cảnh báo', 'Bạn chưa đăng nhập');
        return Redirect::to('/show-login');
        }else{
            $info_product = DB::table('product')->where('product_id',$id)->first();
            $data = array();
            $data['customer_id'] = Session::get('customer_id');
            $data['product_id']= $info_product->product_id;
            DB::table('whishlist')->insert($data);
            return Redirect::to('/shop');
        }

    }
    public function DeleteWhishlist( $id){

        $customer_id = Session::get('customer_id');
        if(!isset($customer_id)){
        Alert::warning('Cảnh báo', 'Bạn chưa đăng nhập');
        return Redirect::to('/show-login');
        }
        else{
        DB::table('whishlist')->where('customer_id',Session::get('customer_id'))->where('product_id',$id)->delete();
        Alert::success('Thông Báo', 'Xóa thành công !');
        return Redirect::to('whishlist');
             }
        }
        
}
