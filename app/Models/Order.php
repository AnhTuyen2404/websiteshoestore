<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 20/8/2023
 * Time: 6:38 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public static function countOrder()
    {
        $data=DB::select('SELECT COUNT(*) as sl FROM `order`');
        if($data){
            foreach ($data as $result){
                return $result->sl;
            }
            return $data;
        }
        return 0;
    }

    public static function counblog()
    {
        $data=DB::select('SELECT COUNT(*) as sl FROM `blog`');
        if($data){
            foreach ($data as $result){
                return $result->sl;
            }
            return $data;
        }
        return 0;
    }

    use HasFactory;

    protected $table = 'order'; // Tên bảng trong CSDL
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id',
        'order_state',
        'create_date',
        'total_bill',
        'payment_methods',
        'shipping_id',
        'customer_id'
    ];
    public $timestamps = false;
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }
}