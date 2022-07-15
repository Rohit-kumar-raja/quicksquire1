<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class PinCodeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        error_reporting(0);
        // echo $row[3];
        // exit;
        // if($row[3]=='available'){
        //     $status=1;
        // }else{
        //     $status=0;
        // }
        $status = 1;
        DB::table('pincode')->insert(['pincode' => $row[0],'country' => $row[1],'city' => $row[2],   'district' => $row[3], 'state' => $row[4], 'status' => $status]);
    }
}
