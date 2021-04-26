<?php

namespace App\Imports;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Student([
            'studentname'    => $row['studentname'],
            'fathername'     => $row['fathername'],
            'mothername'     => $row['mothername'],
            'email'          => $row['email'],
            'date'           => $row['date'],
            'education'     => $row['education'],
            'country'       => $row['country'],
            'image'         => $row['image'],
            'address'     => $row['address'],

            
        ]);
    }
}
