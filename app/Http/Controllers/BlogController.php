<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function GetAllBlog(){
        $GetBlog = DB::table('blog')->join('staff','blog.staff_id','=','staff.staff_id')->get();
        return view('client.blog',compact('GetBlog'));
    }
    public function GetBlogDetails($id){
        $GetBlogDetails = DB::table('blog')->where('blog_id',$id)->join('staff','blog.staff_id','=','staff.staff_id')->get();
        return view('client.blogdetails',compact('GetBlogDetails'));
    }

    public function index()
    {
        $blog=DB::select('SELECT * FROM `blog` order by blog_id ASC');
        // return $category;
        return view('admin.blog.index')->with('blogs',$blog);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $ma = $request->input('blog_id');
        $ten = $request->input('blog_title');
        $noidung = $request->input('blog_content');
        $img = $request->input('image');

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('temp', 'public');
        $imageName = basename($imagePath);
        $targetPath = public_path('client/img/blog');
        File::move(storage_path("app/public/$imagePath"), "$targetPath/$imageName");

        DB::insert('INSERT INTO `blog`(`blog_id`, `blog_img`, `blog_title`, `blog_content`, staff_id) VALUES (?, ?, ?, ?,?)',[$ma,$imageName,$ten,$noidung,'sf01']);
        return redirect()->route('blog.index');
    }

    public function edit($id)
    {
        $blog=DB::select('SELECT * FROM `blog` where blog_id = ?',[$id]);
        // return $category;
        return view('admin.blog.edit')->with('blog',$blog);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $ten = $request->input('ten');
        $noidung = $request->input('noidung');
        DB::update('UPDATE `blog` SET `blog_title`= ?,`blog_content`= ? where blog_id = ?',[$ten, $noidung, $id]);
        return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        // return $request->all();
        DB::delete('DELETE FROM `blog` WHERE blog_id = ?',[$id]);
        return redirect()->route('blog.index');
    }
}
