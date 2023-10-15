<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 5:18 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{

    public function show(Order $order)
    {
        return view('admin.order.order', compact('order'));
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.order.orders', compact('orders'));
    }
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order.edit_order', compact('order'));
    }
    public function showOrderDetails()
    {
        $order_dt = OrderDetail::all();
        return view('admin.order.orderDetail', compact('order_dt'));
    }

    public function updateOrder(Request $request, $order_id)
    {
        $order = Order::find($order_id);

        if (!$order) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
        }

        $order->order_state = $request->input('order_state');
        // Cập nhật các trường khác tương tự ở đây

        $order->save();

        return redirect()->route('order_index', ['id' => $order->order_id])->with('success', 'Đơn hàng đã được cập nhật thành công.');
    }
}