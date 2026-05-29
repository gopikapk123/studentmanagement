<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   protected $table='table_course';
   protected $primaryKey = 'id';
   protected $fillable = ['name','duration'];
}
