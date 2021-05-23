<?php
namespace App\Util;
use App\Interfaces\PurchaseBill;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Order;
use App\Models\Seed;
use App\Models\SeedOrders;
class GeneratePdf implements PurchaseBill {

    public function download()
    {

    }

    public function generate($id){

        $orders=SeedOrders::getPurchase($id);
        $data = [
            'orders' => $orders
        ];
        return \PDF::loadView('bill.factura', $data)
        ->stream('archivo.pdf'); #cambiar stream por download para descargar

    }

}