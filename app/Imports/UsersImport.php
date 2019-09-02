<?php

namespace SIPAE\Imports;

use SIPAE\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'email'     => $row['documento'],
            'password' => \Hash::make($row['nombre']),
        ]);
    }
}
