<?php
namespace App\Util;
use App\Interfaces\PurchaseBill;
use Illuminate\Support\Facades\Storage;

class GenerateExcel implements PurchaseBill {

    public function download()
    {

    }

    public function generate($info){
        print("hola");
    }

}