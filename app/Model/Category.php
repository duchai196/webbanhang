<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subCategory()
    {
        return $this->hasMany('App\Model\Category','parent_id','id');
    }
    public  function  post()
    {
        return $this->hasMany('App\Model\Post','category_id','id');
    }

    public  function  product()
    {
        return $this->hasMany('App\Model\Product','category_id','id');
    }

}
