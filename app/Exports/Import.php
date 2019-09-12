<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Import implements ToCollection, WithHeadingRow
{
    public $data;
    public function collection(Collection $row)
    {
        $this->data = $row->toArray();
    }

    public function headingRow(): int
    {
        return 1;
    }
}