<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 9:53 PM
 */

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends ContacController
{
    public function accounts()
    {
        $accounts = Customer::all(); // Lấy danh sách các tài khoản
        return view('admin.user.accounts', ['accounts' => $accounts]);
    }

    public function deleteAccount($id)
    {
        $account = Customer::find($id);

        if ($account) {
            $account->delete();
            Alert::success('succes','The account has been successfully deleted.');
            return redirect()->route('admin.accounts');
        } else {
            return redirect()->route('admin.accounts')->with('error', 'ERROR');
        }
    }



    public function updateAccount(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_phone' => 'required|numeric',
            'customer_email' => 'required|email',
            // 'customer_password' => [
            //     'required',
            //     'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            // ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.editAccount', $id)->withErrors($validator)->withInput();
        }

        $account = Customer::find($id);
        $account->update([
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'customer_email' => $request->input('customer_email'),
            // 'customer_password' => $request->input('customer_password'),
        ]);
        Alert::success('succes','Account information has been updated.');
        return redirect()->route('admin.accounts');

    }
            public function updateAccountStatus($id, Request $request)
        {
            // Validate request if needed

            $newStatus = $request->input('status');

            // Update the status in the database
            $account = Customer::find($id);
            $account->status = $newStatus;
            $account->login_attempts = 0;
            $account->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

    public function editAccount($id)
    {
        $account = Customer::where('customer_id', $id)->first(); // Tìm tài khoản dựa trên id
        return view('admin.user.editAccount', ['id' => $id,'account' => $account]); // Điều hướng tới view sửa
    }
    

}