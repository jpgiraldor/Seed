<?php
namespace App\Util;
use App\Interfaces\PurchaseBill;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Order;

class GeneratePdf implements PurchaseBill {

    public function download()
    {

    }

    public function generate($id){
        #Auth::user()->id
        #$data["orders"] = Order::getOrders($id);


        #data = [];
        #$pdf = app('dompdf.wrapper');
        #$pdf->loadHTML('<h1>Esto falta ver como lo llenamos porque que mamera</h1>');
        $data = [
            'orders' => Order::getOrders($id)
        ];
    
        return \PDF::loadView('bill.factura', $data)
        ->stream('archivo.pdf'); #cambiar stream por download para descargar

    }

}