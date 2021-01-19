<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
        
    protected $fillable = ['name', 'sku', 'upc', 'partnumber', 'slug', 'description', 'extract', 'image','image_2','image_3','image_4','image_5','data_sheet_1','data_sheet_2','data_sheet_3', 'visible', 'stock',
    'title_sheet_1', 'title_sheet_2', 'title_sheet_3','download_1','download_2','download_3','title_download_1', 'title_download_2', 'title_download_3',
    'unitPrice','product_presentation','estimated_weight','price','price_dealer','tax',
    'category_id','categorytwo_id','categorythree_id','categoryfour_id','categoryfive_id','field_1','field_2','field_3','field_4','field_5','vip','TypeDemo'];

    // Relation with Category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

     
     // Relation with OrderItem
    public function order_item()
    {
        return $this->hasOne('App\OrderItem');
    }
   
    protected $hidden = [
        'remember_token',
    ]; 
}
