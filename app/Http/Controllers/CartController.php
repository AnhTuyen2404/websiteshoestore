<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Sizes;
class CartController extends Controller
{
    public function ShowCart(){
        return view('client.cart');

    }
    public function SaveCart(Request $request){
    $quantity = $request->quantity;
    $product_id = $request->productid_hidden;
    $size = $request->size;
    
    
    if (empty($size)) {
        Alert::warning('Chú ý', 'Vui lòng chọn kích thước sản phẩm');
        return redirect()->back();
    }
    $sizeData = Sizes::where('product_id', $product_id)->where('size', $size)->first();
    $wareHouse = $sizeData->quantity;
    if ($quantity > $wareHouse) {
        Alert::warning('Chú ý', 'Số lượng sản phẩm trong kho không đủ');
        return redirect()->back();
    } elseif ($quantity == 0) {
        Alert::warning('Chú ý', 'Số lượng sản phẩm phải lớn hơn 0');
        return redirect()->back();
    } else {
        $info_product = DB::table('product')->where('product_id', $product_id)->get();

        foreach ($info_product as  $item) {
            $data['id'] = $item->product_id;
            $data['qty'] = $quantity;
            $data['name'] = $item->product_name;
            $data['price'] = $item->price;
            $data['weight'] = "123";
            $data['options']['image'] = $item->product_img;
            $data['options']['size'] = $size;
        }

        Cart::setGlobalTax(0);
        Cart::add($data);
        Alert::success('Thông báo', 'Thêm vào giỏ hàng thành công');
        return redirect()->back();
    }
}

    public function DeleteCart($rowId){
        Cart::remove($rowId);
        Alert::success('Notification!',' Deleted  !');
        return Redirect::to('/show-cart');
    }
    public function clearCart()
{
    Cart::destroy(); 
    Alert::success('Notification!',' Deleted  !');
    return redirect()->back();
}
    public function UpdateCart(Request $request){
        $rowId = $request->rowId;
        $qty = $request->quantity;
        
        Cart::update($rowId,$qty);

        return Redirect::to('/show-cart');

    }
    public function AddOneCart($id){
        $info_product = DB::table('product')->where('product_id',$id)->get();
        foreach($info_product as $key => $item){
            $data['id']= $item->product_id;
            $data['qty']= 1;
            $data['name']= $item->product_name;
            $data['price']= $item->price;
            $data['weight']= "123";
            $data['options']['image']= $item->product_img;
         }
         Cart::add($data);
         return Redirect::to('/shop');
    }

    public function add_cart_ajax(Request $request){
        // Session::forget('cart');
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as  $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    }
    public function gio_hang(Request $request){
        //seo 
        //slide
    //    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

       $meta_desc = "Giỏ hàng của bạn"; 
       $meta_keywords = "Giỏ hàng Ajax";
       $meta_title = "Giỏ hàng Ajax";
       $url_canonical = $request->url();
       //--seo
       $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
       $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

       return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
   }
}
