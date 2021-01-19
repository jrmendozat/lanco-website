<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password','user','user_type','active','address','cell_phone','local_phone',
        'rif_Invoice','name_invoice','adress_invoice','create_by','seller_assigned','vip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // Relation with Orders
     public function orders()
     {
         return $this->hasMany('App\Order');
     }
 
      // Relation with PostOrderPay
     public function PostOrderpay()
     {
         return $this->hasMany('App\PostOrderpay');
     }
 
     // Relation with Orders
     public function LoginRegister()
     {
         return $this->hasMany('App\LoginRegister');
     }
}
