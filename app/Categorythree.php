<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorythree extends Model
{
    //
    protected $table = 'categoriesthree';

	protected $fillable = ['name', 'slug', 'description', 'color'];

	public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany('App\Product','categorythree_id','id');
    }
}
