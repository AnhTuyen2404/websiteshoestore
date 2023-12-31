<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class AuthenticatorController extends Controller
{
    public function ShowLogin(){
        if(Session::get('customer_data')== null){
            return view('client.login');
        }else{
            $id = Session::get('customer');
            $data_customer = DB::table('customer')->where('customer_id', $id)->get();
            return view('client.profile')->with('data_customer',$data_customer);
        }
    }
    public function ShowRegister(){
        return view('client.register');
    }
    
    public function Login(Request $request){
        if ($request->email == null || $request->password == null) {
            Alert::warning('Cảnh Báo!', 'Chưa nhập đủ thông tin');
            return Redirect::to('/show-login');
        } else {
            $customer = DB::table('customer')->where('customer_email', $request->email)->first();
            if ($customer) {
                if ($customer->login_attempts >= 5) {
                    // Khóa tài khoản
                    DB::table('customer')->where('customer_id', $customer->customer_id)->update(['status' => 'locked']);
                    Alert::warning('Warning!', 'Your account has been locked due to too many unsuccessful login attempts');
                    return Redirect::to('/show-login');
                }elseif ($customer->status === 'active') {
                    $hashedPassword = md5($request->password);
                    if ($customer->customer_password === $hashedPassword) {
                        // Đăng nhập thành công
                        // Reset số lần đăng nhập sai
                        $customerData = [
                            'id' => $customer->customer_id,
                            'name' => $customer->customer_name,
                            'email' => $customer->customer_email,
                            'phone' => $customer->customer_phone,
                        ];
                        Session::put('customer_data', $customerData);
                        Session::put('name', $customer->customer_name);
                        Session::put('customer', $customer->customer_id);
    
                        // Reset số lần đăng nhập sai
                        DB::table('customer')->where('customer_id', $customer->customer_id)->update(['login_attempts' => 0]);
    
                        Alert::success('Thông Báo!', 'Đăng nhập thành công');
                        return Redirect::to('/');
                    } else {
                        // Sai mật khẩu
                        // Tăng số lần đăng nhập sai
                        $loginAttempts = $customer->login_attempts + 1;
                        DB::table('customer')->where('customer_id', $customer->customer_id)->update(['login_attempts' => $loginAttempts]);
    
                        Alert::warning('Cảnh Báo!', 'Password không đúng');
                        return Redirect::to('/show-login');
                    }
                } elseif ($customer->status === 'locked') {
                    Alert::warning('Cảnh Báo!', 'Tài khoản của bạn đã bị khóa');
                    return Redirect::to('/show-login');
                } else {
                    Alert::warning('Cảnh Báo!', 'Tài khoản không hoạt động');
                    return Redirect::to('/show-login');
                }
            } else {
                Alert::warning('Cảnh Báo!', 'Email chưa được đăng ký');
                return Redirect::to('/show-login');
            }
        }
    }
    

    public function Register(Request $request) {
        $emailExists = DB::table('customer')->where('customer_email', $request->email)->exists();
        if ($emailExists) {
            Alert::warning('Cảnh Báo!', 'Email đã tồn tại');
            return Redirect::to('/show-register');
        }

        // Kiểm tra mật khẩu
        if ($request->name == null || $request->phone == null || $request->email == null || $request->password == null) {
            Alert::warning('Cảnh Báo!', 'Chưa nhập đủ thông tin');
            return Redirect::to('/show-register');
        } elseif (strlen($request->password) < 8 || !preg_match('/[A-Z]/', $request->password) || !preg_match('/[0-9]/', $request->password) || !preg_match('/[^A-Za-z0-9]/', $request->password)) {
            Alert::warning('Cảnh Báo!', 'Mật khẩu phải có ít nhất 8 ký tự, ít nhất một chữ hoa, ít nhất một số, và ít nhất một ký tự đặc biệt');
            return Redirect::to('/show-register');
        }
        $data_register = array(
            'customer_name' => $request->name,
            'customer_phone' => $request->phone,
            'customer_email' => $request->email,
            'customer_password' => md5($request->password),
            'status' => 'active',
        );
        DB::table('customer')->insert($data_register);

        Alert::success('Thông Báo!', 'Đăng ký thành công !');

        return Redirect::to('/show-login');
    }
    public function Logout() {
        Session::forget('customer_data'); 
        Session::pull('customer_id');
        Session::pull('customer_name');
        Alert::info('Thông Báo!', 'Đã Đăng Xuất !');
        return Redirect::to('/');
    }

    public function Profile(){
        $id = Session::get('customer');
        $data_customer = DB::table('customer')->where('customer_id', $id)->get();
        return view('client.profile')->with('data_customer',$data_customer);
}

    public function editProfile(Request $request){
        // $id = Session::get('customer');
        
        return Redirect::to('/profile');
    }
    public function updateProfile(Request $request){
        $id = Session::get('customer');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        DB::update('UPDATE `customer` SET `customer_name`= ?,`customer_phone`= ? ,`customer_address`= ? where customer_id = ?',[$name, $phone, $address,$id]);
        Alert::success('Thông Báo', ' Update successful! ');
        return Redirect::to('/profile');
    }
    public function changePassword(Request $request){
        return view('client.changepassword');
    }

    public function saveChangePassword(Request $request){
        $old_password = DB::table('customer')->where('customer_password', md5($request->old_password))->first();
        if (!$old_password) {
            Alert::info('Notification', 'The old password is incorrect!');
            return view('client.changepassword');
        }
    
        $new_password = $request->new_password;
    
        // Thêm ràng buộc cho new_password
        if (strlen($new_password) < 8 || !preg_match('/[A-Z]/', $new_password) || !preg_match('/[0-9]/', $new_password) || !preg_match('/[^A-Za-z0-9]/', $new_password)) {
            Alert::info('Notification', 'New password must be at least 8 characters long, contain an uppercase letter, a number, and a special character.');
            return view('client.changepassword');
        }
    
        if ($new_password != $request->confirm_password) {
            Alert::info('Notification', 'Password not match');
            return view('client.changepassword');
        }
    
        $id = Session::get('customer');
        $data = array();
        $data['customer_password'] = md5($new_password);
        DB::table('customer')->where('customer_id', $id)->update($data);
        Alert::success('Notification', 'Update successful!');
        return Redirect::to('/profile');
    }
    
    
}
