<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudenExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */  
    // use Exportable;

    public function headings(): array
    {
        return [
            'id',
            'studentname',
            'fathername',
            'mothername',
            'email',
            'date',
            'education',
            'country',
            'image',
            'address',
            'createdAt',
            'updatedAt',
        ];
    }
    public function query()
    {
        return Student::query();
        /*you can use condition in query to get required result
         return Bulk::query()->whereRaw('id > 5');*/
    }
    public function map($bulk): array
    {
        return [
            $bulk->id,
            $bulk->studentname,
            $bulk->fathername,
            $bulk->mothername,
            $bulk->email,
            $bulk->date,
            $bulk->education,
            $bulk->country,
            $bulk->image,
            $bulk->address,
        ];
    }

}
