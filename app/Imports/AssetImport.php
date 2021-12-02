<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use DB;

class AssetImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $last_id = db::table('r_assets')
        ->insertgetID([
            'ASSET_NAME' => trim($row[1])
            , 'ASSET_TYPE' => trim($row[2])
            , 'LOCATION_ID' => DB::table('r_location_information')
            ->where( strtolower('RLI_LOCATIONAME'), strtolower($row[3]) )->value('RLI_LOCATIONID')
            , 'ASSET_STATUS' => trim($row[4])
        ]);

        db::table('r_asset_logs')
        ->insert([
            'ASSET_ID' => $last_id
            , 'LOCATION_STATUS' => trim($row[6])
            
        ]);
    }

    public function startRow():int
    {
        return 3;
    }
}
