<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class AuthenticatorController extends Controller
{
public function ShowLogin(){
    return view('client.login');
}
public function ShowRegister(){
    return view('client.register');
}
public function Login(Request $request){
    if($request->email == null || $request->password == null){
        Alert::warning('Cảnh Báo ! ','Chưa nhập đủ thông tin ');
        return Redirect::to('/show-login');
    }else{
        $email = DB::table('customer')->where('customer_email', $request->phone)->first();
        if($email){
            $password = DB::table('customer')->where('customer_password',md5($request->password))->first();
            if($password){
                Session::put('customer_email',$email->customer_name);
                Session::put('customer_id',$email->customer_id);
                Alert::success('Thông Báo ! ','Đăng nhập thành công ');
                return Redirect::to('/');
            }else{
                Alert::warning('Cảnh Báo ! ','Password không đúng');
                return Redirect::to('/show-login');
            }
        }else{
            Alert::warning('Cảnh Báo ! ','Email chưa được đăng ký');
            return Redirect::to('/show-login');
        }
    }
}
public function Register(Request $request){
    if($request->name == null || $request->phone==null || $request->email==null||$request->password==null){
        Alert::warning('Cảnh Báo ! ','Chưa nhập đủ thông tin ');
        return Redirect::to('/show-register');
    }else{
        $data = DB::table('customer')->where('customer_phone', $request->phone)->first();
        if($data){
            Alert::warning('Cảnh Báo ! ','Số điện thoại đã đăng ký ');
            return Redirect::to('/show-register');
        }else{
            $data_register = array();
            $data_register['customer_name'] = $request->name ;
            $data_register['customer_phone'] = $request->phone;
            $data_register['customer_email'] =$request->email;
            $data_register['customer_password'] = $request->password;
            DB::table('customer')->insert($data_register);
            Alert::success('Thông Báo ! ','Đăng ký thành công !');
            return Redirect::to('/show-login');
        }
    
    }
}
public function Logout(){
    Session::pull('customer_id');
    Session::pull('customer_name');
    Alert::info('Thông Báo!','Đã Đăng Xuất !');
    return Redirect::to('/');
}

}
