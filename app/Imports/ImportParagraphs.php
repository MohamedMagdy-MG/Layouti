<?php

namespace App\Imports;

use App\Models\Avatars\AvatarsParagraphs;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportParagraphs implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AvatarsParagraphs([
            'pharagraphEn' => $row[0],
            'pharagraphAr' => $row[1],
        ]);
    }
}
