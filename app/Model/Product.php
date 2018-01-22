<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public  function  category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }
    public  function  brand()
    {
        return $this->belongsTo('App\Model\Brand','brand_id','id');
    }


    public  function imageDetail()
    {
        return $this->hasMany('App\ImgProduct','product_id','id');
    }

}
