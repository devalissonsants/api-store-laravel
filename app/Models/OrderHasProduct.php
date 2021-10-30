<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHasProduct extends Model
{
    protected $table='order_has_products';
    protected $guarded = [];
}
