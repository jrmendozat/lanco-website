<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryfour extends Model
{
    //
    protected $table = 'categoriesfour';

	protected $fillable = ['name', 'slug', 'description', 'color'];

	public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany('App\Product','categoryfour_id','id');
    }
}
