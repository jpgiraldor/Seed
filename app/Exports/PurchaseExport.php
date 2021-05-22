<?php

namespace App\Exports;
use App\Models\Seed;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{
    public function collection()
    {
        return Seed::all();
    }
}