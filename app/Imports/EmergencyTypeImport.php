<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class EmergencyTypeImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        db::table('r_emergency_type')
        ->insert([
            'RET_TYPENAME' => trim($row[0])
            
        ]);
    }

    public function startRow():int
    {
        return 3;
    }
}
