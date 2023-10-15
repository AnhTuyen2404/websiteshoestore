<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 20/8/2023
 * Time: 6:17 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    public static function countActiveProduct()
    {
        $data=DB::select('SELECT COUNT(*) as sl FROM `product` where product_state = \'show\'');
        if($data){
            foreach ($data as $result){
                return $result->sl;
            }
            return $data;
        }
        return 0;
    }
}