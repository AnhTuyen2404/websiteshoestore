<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 1:14 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $product=DB::select('SELECT `product_id`, `product_name`, `quantity`, `product_status`, `product_state`, `product_img`, `price`, product.create_date, product.category_id, category_name FROM `product`,category WHERE category.category_id = product.category_id order by product_id ASC');
        // return $category;
        return view('admin.product.index')->with('products',$product);
    }

    public function create()
    {
        $category=DB::select('SELECT * FROM `category` order by category_id ASC');
        return view('admin.product.create')->with('categories',$category);;
    }

    public function store(Request $request)
    {
        // return $request->all();
        $ma = $request->input('ma');
        $ten = $request->input('ten');
        $soluong = $request->input('soluong');
        $noidung = $request->input('noidung');
        $trangthai = $request->input('trangthai');

        $img = $request->input('image');
        $gia = $request->input('gia');
        $loaihang = $request->input('cat_id');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('temp', 'public');
        $imageName = basename($imagePath);
        $targetPath = public_path('client/img/shop');
        File::move(storage_path("app/public/$imagePath"), "$targetPath/$imageName");

        DB::insert('INSERT INTO `product`(`product_id`, `product_name`, `quantity`, `product_status`, `product_state`, `product_img`, `price`, `category_id`) VALUES (?,?,?,?,?,?,?,?)',[
            $ma, $ten, $soluong, $noidung, $trangthai,$imageName,$gia,$loaihang
        ]);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product=DB::select('SELECT `product_id`, `product_name`, `quantity`, `product_status`, `product_state`, `product_img`, `price`, product.create_date, product.category_id, category_name FROM `product`,category WHERE category.category_id = product.category_id and product_id = ?',[$id]);
        $category=DB::select('SELECT * FROM `category` order by category_id ASC');
        // return $category;
        $data = [
            'product' => $product,
            'category' => $category,
            // Thêm các biến khác nếu cần
        ];
        return view('admin.product.edit')->with('product',$data);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $ten = $request->input('ten');
        $soluong = $request->input('soluong');
        $noidung = $request->input('noidung');
        $trangthai = $request->input('trangthai');
        $gia = $request->input('gia');
        $loaihang = $request->input('cat_id');

        DB::update('UPDATE `product` SET `product_name`= ?,`quantity`= ?, product_status = ?, product_state = ?, price = ?, category_id = ? where product_id = ?',[$ten, $soluong, $noidung, $trangthai, $gia, $loaihang, $id]);
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        // return $request->all();
        DB::delete('DELETE FROM `product` WHERE product_id = ?',[$id]);
        return redirect()->route('product.index');
    }
}