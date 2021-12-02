<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use DB;

class GuardImport implements ToModel,WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        db::table('r_account_information')
        ->insert([
            'RAI_LASTNAME' => trim($row[0])
            , 'RAI_FIRSTNAME' => trim($row[1])
            , 'RAI_MIDDLENAME' => ( empty(trim($row[2])) ) ? "" : trim($row[2])
            , 'RAI_PASSWORD' => md5('123456')
            , 'RAI_TYPE' => db::table('r_account_type')->where('RAT_TYPE',strtolower($row[3]))->value('RAT_TYPEID')
            , 'MOBILE_NUMBER' => trim($row[4])
            , 'HOME_ADDRESS' => trim($row[5])
            , 'CITY' => trim($row[6])
            , 'PROVINCE' => trim($row[7])
            , 'EMERGENCY_CONTACT_PERSON' => trim($row[8])
            , 'EMERGENCY_CONTACT_NUMBER' => trim($row[9])
            , 'RAI_PICTURE' => md5("policeman.png")
        ]);
    }

    public function startRow():int
    {
        return 3;
    }

}
