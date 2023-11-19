<?php
/**
 * Created by PhpStorm.
 * User: v2nfi
 * Date: 22/8/2023
 * Time: 9:55 PM
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
    protected $table = 'customer'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = [
    'customer_id',
    'customer_name',
    'customer_phone',
    'customer_email',
    'customer_password',
    'token',
    'status',
    'login_attempts']; // Các trường có thể gán dữ liệu từ form
    
    use Notifiable;

}