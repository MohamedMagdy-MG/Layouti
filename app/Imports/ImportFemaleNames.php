<?php

namespace App\Imports;

use App\Models\Avatars\AvatarsFemaleNames;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportFemaleNames implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AvatarsFemaleNames([
            'fnameEn' => $row[0],
            'lnameEn' => $row[1],
            'fnameAr' => $row[2],
            'lnameAr' => $row[3],
        ]);
    }
}
