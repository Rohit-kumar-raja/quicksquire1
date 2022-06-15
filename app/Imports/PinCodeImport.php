<?php

namespace App\Imports;

use App\Models\Pincode;
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
        dd($row);
        return new Pincode([
            'city' => $row[0],
            'pincode' => $row[1],
            'district' => '',
            'state' => '',
            'country' => '',
        ]);
    }
}
