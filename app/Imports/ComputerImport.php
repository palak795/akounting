<?php

namespace App\Imports;
use App\Models\Computer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ComputerImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Computer([
'model' => $row['model'],
'brand' => $row['brand'],
'date_of_manufacture' => $row['date_of_manufacture'],
'ram' => $row['ram'],
'processor' => $row['processor'],
'display' => $row['display'],
'accessories' => $row['accessories'],
'warranty' => $row['warranty'],
'description' => $row['description'],
'storage' => $row['storage'],
'battery_capacity' => $row['battery_capacity'],

            
        ]);
    }
}
