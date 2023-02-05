<?php

namespace App\Imports;

use App\Models\Avatars\AvatarsTitles;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTitles implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AvatarsTitles([
            'titleEn' => $row[0],
            'titleAr' => $row[1],
        ]);
    }
}
