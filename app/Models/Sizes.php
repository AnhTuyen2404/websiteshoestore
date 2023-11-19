<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $primaryKey = 'size_id';
    protected $fillable = [
        'size_id ',
        'product_id',
        'size',
        'quantity',
    ];
}
