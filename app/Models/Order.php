<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    //protected $guarded = [];
    protected $fillable = ['request_number', 'client_id', 'request_number', 'date', 'date'];

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
    public function products()
    {
        return $this->hasMany(OrderHasProduct::class, 'order_id', 'id')->with('product');
    }
}

