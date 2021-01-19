<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportProducts implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'sku', 
            'upc', 
            'partnumber', 
            'name',
            'slug', 
            'description', 
            'extract', 
            'image','image_2','image_3','image_4','image_5',
            'data_sheet_1','data_sheet_2','data_sheet_3', 
            'title_sheet_1','title_sheet_2','title_sheet_3',
            'download_1',
            'download_2',
            'download_3',
            'title_download_1', 
            'title_download_2',
            'title_download_3',
            'visible', 
            'stock',
            'unitPrice',
            'product_presentation',
            'estimated_weight',
            'price',
            'price_dealer',
            'tax',
            'field_1','field_2','field_3','field_4','field_5',
            'vip',
            'TypeDemo',
            'category_id','categorytwo_id','categorythree_id','categoryfour_id','categoryfive_id',
            'Updated at'
            
        ];
    }
}
