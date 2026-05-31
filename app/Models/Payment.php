<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payment';
    protected $primaryKey = 'id';
    protected $fillable=['name','email','psyment_id','order_id','amount','status'];
}
