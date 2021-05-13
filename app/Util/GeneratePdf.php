<?php
namespace App\Util;
use App\Interfaces\PurchaseBill;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class GeneratePdf implements PurchaseBill {

    public function download()
    {

    }

    public function generate($info){
        #data = [];
        #$pdf = app('dompdf.wrapper');
        #$pdf->loadHTML('<h1>Esto falta ver como lo llenamos porque que mamera</h1>');
        $data = [
            'titulo' => 'Prueba llevar informacion a el pdf'
        ];
    
        return \PDF::loadView('bill.factura', $data)
        ->stream('archivo.pdf');

    }

}