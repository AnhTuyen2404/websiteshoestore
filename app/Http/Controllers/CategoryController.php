<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 20/8/2023
 * Time: 6:08 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category=DB::select('SELECT * FROM `category` order by category_id ASC');
        // return $category;
        return view('admin.category.index')->with('categories',$category);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $ma = $request->input('ma');
        $ten = $request->input('ten');
        $trangthai = $request->input('trangthai');

        DB::insert('INSERT INTO `category`(`category_id`, `category_name`, `category_state`, `create_date`) VALUES (?,?,?,?)',[$ma,$ten,$trangthai,now()]);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category=DB::select('SELECT * FROM `category` where category_id = ?',[$id]);
        // return $category;
        return view('admin.category.edit')->with('category',$category);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $ten = $request->input('ten');
        $trangthai = $request->input('trangthai');
        DB::update('UPDATE `category` SET `category_name`= ?,`category_state`= ? where category_id = ?',[$ten, $trangthai,$id]);
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        // return $request->all();
        DB::delete('DELETE FROM `category` WHERE category_id = ?',[$id]);
        return redirect()->route('category.index');
    }
}