<?php
/**
 * Created by PhpStorm.
 * User: paditech
 * Date: 8/30/19
 * Time: 11:49 PM
 */

namespace App\Import;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        dd($rows);
        foreach ($rows as $row)
        {
            User::create([
                'name' => $row[0],
            ]);
        }
    }
}