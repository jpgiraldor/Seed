<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\PurchaseBill;
use App\Util\GeneratePdf;
use App\Util\GenerateExcel;
class PurchaseServiceProvider extends ServiceProvider
{
/**
* Register any application services.
*
* @return void
*/

    public function register()
    {
        #esto se supone que se llama binding contextual
        #pero por alguna razon me dice que la interfaz (PurchaseBill) no se puede instanciar
        #antes de que diga cualquier cosa, yo se que una interfaz no se instancia, el problema es que si
        #ahi se supone que va una interfaz porque jode por instancias
        #$this->app->when('SeedController@pdf')
        #          ->needs(PurchaseBill::class)
        #          ->give(function(){
        #              return new GeneratePdf();
        #          });
        $this->app->bind(PurchaseBill::class, function (){
            
            return new GeneratePdf();
        });

    }

}