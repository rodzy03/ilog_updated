<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class ClientImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        db::table('t_clients')
        ->insert([
            'client_name' => trim($row[0])
            , 'total_locations' => trim($row[1])
            , 'total_guards_assigned' => trim($row[2])
            , 'client_representative' => trim($row[3])
            , 'client_contact' => trim($row[4])
            , 'client_address' => trim($row[5])
            , 'client_email' => trim($row[6])
        ]);
    }

    public function startRow():int
    {
        return 3;
    }
}
