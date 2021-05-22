<?php
namespace App\Util;
use App\Interfaces\PurchaseBill;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchaseExport;
class GenerateExcel implements PurchaseBill{

    public function download()
    {

    }

    public function view():View
    {

    }

    public function generate($info)
    {
        return Excel::download(new PurchaseExport, 'purchase.xlsx');  
    }

}