<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    protected $primaryKey='id';

    protected $fillable=['name','des','image','user_id'];
    public $timestamps=true;

    public function nameUpper(){
    	return strtoupper($this->name);
    }
    public function user(){
    	return $this->belongsTo('App\Model\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Model\Category')->withPivot('price')->withTimestamps();
    }
}
