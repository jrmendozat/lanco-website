<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorytwo extends Model
{
    //
    protected $table = 'categoriestwo';

	protected $fillable = ['name', 'slug', 'description', 'image', 'color'];

	public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany('App\Product','categorytwo_id','id');
    }
}
