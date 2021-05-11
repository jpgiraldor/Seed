<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\PurchaseBill;
use App\Util\GeneratePdf;
class PurchaseServiceProvider extends ServiceProvider
{
/**
* Register any application services.
*
* @return void
*/

    public function register()
    {
        $this->app->bind(PurchaseBill::class, function (){
            return new GeneratePdf();
        });
    }

}