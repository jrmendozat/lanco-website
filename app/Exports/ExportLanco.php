<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportLanco implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    
    public function collection()
    {
        return Product::all(
                            'name', 
                            'description', 
                            'extract', 'image','image_2','image_3',
                            'visible', 'stock',
                            'unitPrice',
                            'product_presentation',
                            'price',
                            'price_dealer',
                            'category_id',
                            'categorytwo_id'
                            );

    }


    public function headings(): array
    {
        return [ 
                'Nombre', 
                'Descripcion', 
                'Descripcion Corta', 
                'Imagen_1','Imagen_2','Imagen_3',
                'visible', 
                'stock',
                'Precio Por',
                'Presentation Producto',
                'Precio Detal',
                'Precio Distribuidor',
                'Clasificacion',
                'Clasificacion 2'
        ];
    }
}
