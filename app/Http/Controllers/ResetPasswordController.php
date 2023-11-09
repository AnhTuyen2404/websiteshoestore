<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Notifications\ResetPasswordRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
class ResetPasswordController extends Controller
{
    public function forgetPassword(Request $request)
{
    return view('client.forgetpassword');
}




    public function checkMail(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "RESET PASSWORD FORM SHOE STORE " . $now;
        $customer = Customer::where('customer_email', $data['email'])->first();

        if ($data['email'] == null) {
            Alert::warning('Warning ! ', 'Not enough information has been entered');
            return Redirect::to('/forget-password');
        } elseif (!$customer) {
            Alert::warning('Warning ! ', 'Mail not found');
            return Redirect::to('/forget-password');
        } else {
            $token = Str::random(60);
            $customer->token = $token;
            $customer->save();

            $to_email = $data['email'];
            $link_reset_pass = url('/newpassword?email=' . $to_email . '&token=' . $token);
            $mailData = [
                "name" => "Shoe Store",
                "body" => $link_reset_pass,
                'email' => $data['email']
            ];

            Mail::send('client.forgetpasswordnotify', ['data' => $mailData], function ($message) use ($title_mail, $data) {
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'], $title_mail);
            });

            Alert::warning('message! ', 'We have e-mailed your password reset link!');
            return Redirect()->back();
        }
    }

    public function viewNewPassword(Request $request)
    {
        
            return view('client.newpassword');
        
    }
    public function reset(Request $request)
    {
        $data = $request->all();
        $token = Str::random(60);
        $customer = Customer::where('customer_email','=', $data['email'])->where('token','=', $data['token'])->get();
        $count = $customer->count();
        if($count > 0){
            foreach($customer as $key => $cus) {
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = md5($data['password']);
            $reset->token = $token;
            $reset->save();
            Alert::warning('success! ', 'The password has been updated');
            return Redirect::to('/show-login');
        }else{
            Alert::warning('error! ', 'Please perform the operation again as the link has expired!!');
            return Redirect::to('/forget-password');
        }
    }
}