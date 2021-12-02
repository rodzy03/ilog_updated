<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use DB;

class ScheduleImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        
        
        $query = DB::select('call SP_SEARCH_NAME(?)',array(trim($row[0].' '.$row[1])) );  
        
        $guard_id = isset($query[0]->RAI_ACCOUNTID) ? $query[0]->RAI_ACCOUNTID : 0;
        
        db::table('t_guard_shifts')
        ->insert([
            'TGS_GUARDID' => $guard_id
            , 'SHIFT_ID' => DB::table('t_shift_configs')
            ->where( strtolower('tsc_value'), strtolower($row[3]) )->value('tsc_config')
            , 'VALIDITY_START' => preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/" ,$row[4], $matches) == true ? $row[4] :
            \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m-d')

            , 'VALIDITY_END' => preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/" ,$row[5], $matches) == true ? $row[5] :
            \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d')

            , 'TGS_LOCATIONID' => DB::table('r_location_information')
            ->where( strtolower('RLI_LOCATIONAME'), strtolower($row[6]) )->value('RLI_LOCATIONID')
           
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
