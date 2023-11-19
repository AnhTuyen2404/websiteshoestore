<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 5:21 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    public $timestamps = false;
    protected $primaryKey = 'order_details_id';
    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'product_price', 'product_quantity', 'product_img' , 'discount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}