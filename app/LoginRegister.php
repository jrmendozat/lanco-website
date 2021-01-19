<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginRegister extends Model
{
    //
    protected $table = 'LoginRegister';

	protected $fillable = ['user_id', 'ip_access','country_access','view_type_products','view_type_scream','Category_id'];
                           

    // Relation with User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}


