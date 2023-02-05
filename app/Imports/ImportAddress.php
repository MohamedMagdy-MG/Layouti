<?php

namespace App\Imports;

use App\Models\Avatars\AvatarsAddress;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAddress implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AvatarsAddress([
            'addressEn' => $row['0'],
            'addressAr' => $row['1'],
        ]);
    }
}
