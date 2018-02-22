<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table="categories";
    protected $primaryKey='id';
    protected $fillable=['name','des'];
    public $timestamps=true;

    public function products(){
    	return $this->belongsToMany('App\Model\Product')->withPivot('price')->withTimestamps();
    }
}
