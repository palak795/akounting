<?php

namespace App\Exports;

use App\Models\Computer;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComputerExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */  
    // use Exportable;

    public function headings(): array
    {
        return [
            'id',
            'model', 
            'brand',
            'date_of_manufacture', 
            'ram',
            'processor',
            'display', 
            'accessories', 
            'warranty', 
            'description',
            'storage', 
            'battery_capacity',
            'createdAt',
            'updatedAt',
        ];
    }
    public function query()
    {
        return Computer::query();
        /*you can use condition in query to get required result
         return Bulk::query()->whereRaw('id > 5');*/
    }
    public function map($bulk): array
    {
        return [
            $bulk->id,
            $bulk->model,
            $bulk->brand,
            $bulk->date_of_manufacture,
            $bulk->ram,
            $bulk->processor,
            $bulk->display,
            $bulk->accessories,
            $bulk->warranty,
            $bulk->description,
            $bulk->storage,
            $bulk->battery_capacity,
        ];
    }

}
