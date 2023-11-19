<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 5:18 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\ServiceProvider;
// use Barryvdh\DomPDF\PDF;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Coupon;
use PDF;

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
    public function showOrderDetails($id)
    {
        $order = Order::find($id);
        $order_dt = OrderDetail::where('order_id', $id)->get();
        $customer = $order->customer; 
        // return $order ;
        return view('admin.order.orderDetail', compact('order_dt','customer','order'));
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
    public function filterOrders(Request $request)
{
    $orderStatus = $request->input('order_status');

    if ($orderStatus) {
        // Lọc đơn hàng theo trạng thái
        $orders = Order::where('order_state', $orderStatus)->get();
    } else {
        // Nếu không có trạng thái được chọn, lấy tất cả đơn hàng
        $orders = Order::all();
    }
        return view('admin.order.orders', compact('orders'));
}
public function printOrder($id)
{
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->print_order_convert($id));

    return $pdf->stream();
}


public function print_order_convert($id){
    $order_details = OrderDetail::where('order_id',$id)->get();
    $order = Order::where('order_id',$id)->get();
    foreach($order as $key => $ord){
        $customer_id = $ord->customer_id;
        $shipping_id = $ord->shipping_id;
    }
    $customer = Customer::where('customer_id',$customer_id)->first();
    $shipping = Shipping::where('shipping_id',$shipping_id)->first();

    $order_details_product = OrderDetail::with('product')->where('order_id', $id)->get();

    foreach($order_details_product as $key => $order_d){

        $product_coupon = $order_d->discount;
    }
    // if($product_coupon != 'no'){
    //     $coupon = Coupon::where('coupon_code',$product_coupon)->first();

    //     $coupon_condition = $coupon->coupon_condition;
    //     $coupon_number = $coupon->coupon_number;

    //     if($coupon_condition==1){
    //         $coupon_echo = $coupon_number.'%';
    //     }elseif($coupon_condition==2){
    //         $coupon_echo = number_format($coupon_number,0,',','.').'đ';
    //     }
    // }else{
    //     $coupon_condition = 2;
    //     $coupon_number = 0;

    //     $coupon_echo = '0';
    
    // }

    $output = '';

    $output.='<style>body{
        font-family: DejaVu Sans;
    }
    .table-styling{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000; /* Bảng có đường viền mảnh xung quanh */
        margin-bottom: 20px;
    }
    .table-styling tbody tr td{
        border:1px solid #000;
    }
    </style>
    
    </style>
    <h4><center>Total Bill</center></h4>
    <table class="table-styling">
                <tr>
                    <td><strong>Customer Information</strong></td>
                </tr>
                <tr>
                    <td>Name: '.$customer->customer_name.'</td>
                </tr>
            
            <tbody>';
            
    $output.='		
                <tr>
                    
                    <td>Phone: '.$customer->customer_phone.'</td>
                    
                    
                </tr>
                <tr>
                    <td>Email: '.$customer->customer_email.'</td>
                </tr>';
            
            
    $output.='		
                <tr>

                    <td>Address: '.$shipping->shipping_address.'</td>
                </tr>';
            

    $output.='				
            </tbody>
        
    </table>

    <p><strong>Infomation Order</strong></p>
        <table class="table-styling">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>';
        
            $total = 0;

            foreach($order_details_product as $key => $product){

                $subtotal = $product->product_price*$product->product_sales_quantity;
                $total+=$subtotal;

                if($product->product_coupon!='no'){
                    $product_coupon = $product->product_coupon;
                }else{
                    $product_coupon = 'không mã';
                }		
            }
    $output.='		
                <tr>
                    <td>'.$product->product_name.'</td>
                    <td>'.$product->product_name.'</td>
                    <td>'.number_format($product->product_price,0,',','.').'đ'.'</td>
                    
                </tr>';
            


    $output.= '<tr>
            <td colspan="2">
                
                <p>Phí ship: '.number_format($product->product_feeship,0,',','.').'đ'.'</p>
                
            </td>
    </tr>';
                    
    $output.='				
            </tbody>
        
    </table>

    ';


    return $output;


        }
}