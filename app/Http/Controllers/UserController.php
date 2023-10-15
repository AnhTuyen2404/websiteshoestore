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
            return redirect()->route('admin.accounts')->with('success', 'Tài khoản đã được xóa thành công.');
        } else {
            return redirect()->route('admin.accounts')->with('error', 'Không tìm thấy tài khoản.');
        }
    }

    public function showDeleteConfirmation($id)
    {
        $account = Customer::find($id);

        if ($account) {
            return view('admin.user.deleteConfirmation', compact('account'));
        } else {
            return redirect()->route('admin.accounts')->with('error', 'Không tìm thấy tài khoản.');
        }
    }


    public function updateAccount(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_phone' => 'required|numeric',
            'customer_email' => 'required|email',
            'customer_password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.editAccount', $id)->withErrors($validator)->withInput();
        }

        $account = Customer::find($id);
        $account->update([
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'customer_email' => $request->input('customer_email'),
            'customer_password' => $request->input('customer_password'),
        ]);

        return redirect()->route('admin.accounts')->with('success', 'Thông tin tài khoản đã được cập nhật.');

    }

    public function editAccount($id)
    {
        $account = Customer::where('customer_id', $id)->first(); // Tìm tài khoản dựa trên id
        return view('admin.user.editAccount', ['id' => $id,'account' => $account]); // Điều hướng tới view sửa
    }

}