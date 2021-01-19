<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsFailures;


class ImportProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $pos = strpos($row[0],'/',0);
        //dd($pos);
        if ($pos) {
            $slug =  "S_".substr ( $row[0] , 0, $pos-1 );
        } else {
            $slug =  "S_".$row[0];
        }

       
        //dd($pos);
        if (Is_null($row[7])) {
           $stock = 1;
        } else {
            $stock = $row[7];
        }

        if (Is_null($row[6])) {
            $visible = 0; 
        } else {
            $visible = $row[6];
        }
        
        return new Product([
            //
            'name'                     => $row[0],
            'slug'                     => $slug,
            'description'              => $row[1],
            'extract'                  => $row[2],
            'image'                    => $row[3],
            'image_2'                  => $row[4],
            'image_3'                  => $row[5],
            'image_4'                  => "",
            'image_5'                  => "",
            'data_sheet_1'             => "",
            'data_sheet_2'             => "",
            'data_sheet_3'             => "",
            'visible'                  => $visible,
            'stock'                    => $stock,
            'unitPrice'                => $row[8],
            'product_presentation'     => $row[9],
            'estimated_weight'         => 1,
            'price'                    => $row[10],
            'price_dealer'             => $row[11],
            'category_id' 	           => $row[12],
            'categorytwo_id' 	       => $row[13],
            'categorythree_id'         => 1,
            'categoryfour_id'          => 1,
            'categoryfive_id'          => 1,
        ]);
       

       
    }
}





                 