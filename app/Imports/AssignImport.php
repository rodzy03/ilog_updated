<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class AssignImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        

        db::table('t_assign')
        ->insert([
            'location_id' => DB::table('r_location_information')
            ->where( strtolower('RLI_LOCATIONAME'), strtolower($row[0]) )->value('RLI_LOCATIONID')
            , 'client_id' => DB::table('t_clients')
            ->where( strtolower('client_name'), strtolower($row[1]) )->value('client_id')
            , 'supervisor_id' => DB::table('v_get_s_fullnames')
            ->where( strtolower('FULLNAME'), strtolower($row[2]) )->value('RAI_ACCOUNTID')
        ]);

        
    }

    public function startRow():int
    {
        return 3;
    }
}
