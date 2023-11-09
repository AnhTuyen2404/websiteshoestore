<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 8/22/2023
 * Time: 1:14 PM
 */

namespace App\Http\Controllers;

use Exception;
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
        $products = DB::select('SELECT `product_id`, `product_name`, `quantity`, `product_status`, `product_state`, `product_img`, `price`, product.create_date, product.category_id, category_name FROM `product`,category WHERE category.category_id = product.category_id order by product_id ASC');
        // return $category;
        return view('admin.product.index')->with('products', $products);
    }

    public function create()
    {
        $categories = DB::select('SELECT * FROM `category` order by category_id ASC');
        return view('admin.product.create')->with('categories', $categories);;
    }

    public function store(Request $request)
    {
        // // return $request->all();
        $code = $request->input('code');
        $name = $request->input('name');
        // $quantity = $request->input('quantity');
        $sizeFields = $request->only([
            'size_36', 'size_37', 'size_38', 'size_39', 'size_40','size_41', 'size_42', 'size_43', 'size_44', 'size_45'
        ]);
        $quantity = array_sum(array_map('intval', $sizeFields));
        $description = $request->input('description');
        $status = $request->input('status');
        $image = $request->input('image');
        $price = $request->input('price');
        $category = $request->input('cat_id');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('temp', 'public');
        $imageName = basename($imagePath);
        $targetPath = public_path('client/img/shop');
        File::move(storage_path("app/public/$imagePath"), "$targetPath/$imageName");

        $sizes = [
            '36', '37', '38', '39', '40', '41', '42', '43', '44', '45'
        ];
        foreach ($sizes as $size) {
            $sizeValue = $request->input("size_$size");
            if ($sizeValue > 0) {
            DB::insert('INSERT INTO `sizes`( `product_id`, `size`, `quantity`) VALUES (?,?,?)',[
                $code,$size,$sizeValue
            ]);
            }
        }

        DB::insert('INSERT INTO `product`(`product_id`, `product_name`, `quantity`, `product_status`, `product_state`, `product_img`, `price`, `category_id`) VALUES (?,?,?,?,?,?,?,?)',[
            $code, $name, $quantity, $description, $status, $imageName, $price, $category
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
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $status = $request->input('status');
        $price = $request->input('price');
        $category = $request->input('cat_id');

        DB::update('UPDATE `product` SET `product_name`= ?, product_status = ?, product_state = ?, price = ?, category_id = ? where product_id = ?',[$name, $description, $status, $price, $category, $id]);
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        // return $request->all();
        DB::delete('DELETE FROM `product` WHERE product_id = ?',[$id]);
        DB::delete('DELETE FROM `sizes` WHERE product_id = ?',[$id]);
        return redirect()->route('product.index');
    }
}
