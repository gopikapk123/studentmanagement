<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table="batch";
    protected $primaryKey = 'id';
    protected $fillable=['batch_no','course_id','teacher'];


    public function course()
    {
       return $this->belongsTo(Course::class);
    }

}