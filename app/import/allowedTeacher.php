<?php

namespace App\Imports;

use App\Models\AllowedEmail;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class AllowedTeacher implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new AllowedEmail([
            'name' => $row['name'],
            'email' => $row['email']
        ]);
    }

    public function onError(Throwable $error)
    {
    }
}
