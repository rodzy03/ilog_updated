<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use DB;

class StudentImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        
        
        $query = DB::select('call SP_SEARCH_NAME(?)',array($row[0].' '.$row[1]) );  
        
        $guard_id = isset($query[0]->RAI_ACCOUNTID) ? $query[0]->RAI_ACCOUNTID : "";

        db::table('t_guard_shifts')
        ->insert([
            'TGS_GUARDID' => $query[0]->RAI_ACCOUNTID
            , 'SHIFT_ID' => DB::table('t_shift_configs')->where(strtolower('tsc_value'),strtolower(trim($row[3])) )->value('tsc_config')
            
            
            , 'TGS_LOCATIONID' => DB::table('r_location_information')->where(strtolower('RLI_LOCATIONAME'),strtolower(trim($row[4])) )->value('RLI_LOCATIONID')
           
        ]);
    }

    public function startRow():int
    {
        return 3;
    }

    // public function rules(): array
    // {
    //     return [
    //         'student_number' => 'required|string',
    //         'lastname' => 'required|string',
    //         'firstname' => 'required|string',
    //         'middlename' => 'required|string',
    //         'year_and_section' => 'required|string',
    //         'sex' => 'required|string',
    //         'gwa' => 'required|string',
    //         'scholarship_type_id' => 'required|string',
    //         // so on
    //     ];
    // }

}
