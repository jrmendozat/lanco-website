<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryfive extends Model
{
    //
    protected $table = 'categoriesfive';

	protected $fillable = ['name', 'slug', 'description', 'color'];

	public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany('App\Product','categoryfour_id','id');
    }
}
