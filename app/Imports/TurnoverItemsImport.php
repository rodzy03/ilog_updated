<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class TurnoverItemsImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        db::table('r_turnover_items')
        ->insert([
            'RTI_ITEMNAME' => $row[0]
            
            
        ]);
    }

    public function startRow():int
    {
        return 3;
    }
}
