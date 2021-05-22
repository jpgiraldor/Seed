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




    public function generate($id)
    {
        #print(new PurchaseExport());
        return Excel::download(new PurchaseExport($id), 'purchase.xlsx');  
    }

}