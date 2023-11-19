<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CategoryProduct extends Model
{
    public function product(){
        return $this->hasMAny('App\Product');
    }
}
