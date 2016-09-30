<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = 'order_details';

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function book(){
        return $this->hasOne('App\Book','id','book_id');
    }
}
