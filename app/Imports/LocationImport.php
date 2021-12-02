<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class LocationImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        

        db::table('r_location_information')
        ->insert([
            'RLI_LOCATIONAME' => trim($row[0])
            
        ]);

        
    }

    public function startRow():int
    {
        return 3;
    }
}
