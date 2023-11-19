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
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $table = 'product'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = [
    'product_id', 'product_name', 'quantity', 'product_status', 'product_state', 'product_img', 'price', 'create_date', 'category_id'];
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

    public function category(){
        return $this->belongsTo('App\CategoryProductModel','category_id');
    }
}