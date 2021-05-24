<?php

namespace App\Exports;
use App\Models\Seed;
use App\Models\Order;

use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{

    public int $id;
    function __construct($id)
    {
        $this->id=$id;
    }

    public function collection()
    {
        
        return Order::getOrders($this->id);
    }
}