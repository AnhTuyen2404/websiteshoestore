<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 20/8/2023
 * Time: 3:43 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = ['category_id', 'category_name', 'category_state', 'category_date'];

    public static function countActiveCategory()
    {
        $data=DB::select('SELECT COUNT(*) as sl FROM `category` where category_state = \'show\'');
        if($data){
            foreach ($data as $result){
                return $result->sl;
            }
            return $data;
        }
        return 0;
    }

}