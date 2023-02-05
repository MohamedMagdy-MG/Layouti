<?php

namespace App\Imports;

use App\Models\Avatars\AvatarsPositions;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPositions implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AvatarsPositions([
            'positionEn' => $row[0],
            'positionAr' => $row[1],
        ]);
    }
}
