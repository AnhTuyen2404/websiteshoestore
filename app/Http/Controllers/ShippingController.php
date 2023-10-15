<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 7:18 PM
 */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function shipping()
    {
        $ship = Shipping::all();
        return view('admin.shipping.shipping',['shipping'=>$ship]);
    }

    public function shipping_edit($id)
    {
        $ship = Shipping::where('shipping_id', $id)->first();
        return view('admin.shipping.shipping_edit', ['id' => $id, 'ship' => $ship]);
    }

    public function updateShipping(Request $request, $id)
    {
        $request->validate([
            'shipping_name' => 'required',
            'shipping_phone' => 'required|regex:/[0-9]{10}/',
            'shipping_email' => 'required|email',
            'shipping_address' => 'required',
        ]);

        $shipping = Shipping::find($id);

        $shipping->update([
            'shipping_name' => $request->input('shipping_name'),
            'shipping_phone' => $request->input('shipping_phone'),
            'shipping_email' => $request->input('shipping_email'),
            'shipping_address' => $request->input('shipping_address'),
        ]);

        return redirect()->route('admin.shipping')->with('success', 'Thông tin vận chuyển đã được cập nhật.');
    }
    public function deleteShipping($id)
    {
        $shipping = Shipping::find($id);

        if ($shipping) {
            $shipping->delete();
            return redirect()->route('admin.shipping')->with('success', 'Thông tin vận chuyển đã được xóa thành công.');
        } else {
            return redirect()->route('admin.shipping')->with('error', 'Không tìm thấy thông tin vận chuyển.');
        }
    }
}