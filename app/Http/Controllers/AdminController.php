<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 20/8/2023
 * Time: 1:24 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        // if(Session::get('customer_name') == 'admin')
        // {
        //     $data = DB::table('order')
        //         ->select(DB::raw('YEAR(create_date) as year, MONTH(create_date) as month, SUM(total_bill) as total, COUNT(*) as order_count'))
        //         ->where('order_state','=','Đã xác nhận')
        //         ->groupBy(DB::raw('YEAR(create_date), MONTH(create_date)'))
        //         ->get();
        //     return view('admin.index',  compact('data'));

        // }
        // elseif (Session::get('customer_name') == null)
        //     return Redirect::to('/show-login');
        // else
        //     return view('client.home');
        return view('admin.index');
    }
}