<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 6:20 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shipping';
    protected $primaryKey = 'shipping_id';
    protected $fillable = [
        'shipping_name',
        'shipping_phone',
        'shipping_email',
        'shipping_address',
    ];
}