<?php

namespace App\Imports;

use App\records;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new records([
            //
            'AC' => $row[0],
            'Artist'=>  $row[1],
            'Title'=> $row[2],
            'Date'=> $row[3],
            'Medium'=> $row[4],
            'Dimension'=> $row[5],
            'Category'=> $row[6],
        ]);
    }
}
