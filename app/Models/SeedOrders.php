<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class SeedOrders extends Model
{
    use HasFactory;
    //attributes id, amount, seed ,order, created_at, updated_at
    protected $fillable = [
        'seed',
        'order',
        'amount'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getSeed()
    {
        return $this->attributes['seed'];
    }


    public function getAmount()
    {
        return $this->attributes['amount'];
    }
#----------------------------------------------------------------
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setSeed($new_seed)
    {
        $this->attributes['seed'] = $new_seed;
    }


    public function setAmount($new_amount)
    {
        $this->attributes['amount'] = $new_amount;
    }

    public function seed()
    {
        return $this->belongsTo(Seed::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function validate($params)
    {
        $seed = $params['seed'];
        $order = $params['order'];
        $amount = $params['amount'];

        return SeedOrders::create([
            'seed' => $seed,
            'order' => $order,
            'amount' => $amount,
        ]);
    }


    public static function getPurchase($id)
    {
        return DB::table('seed_orders')
        ->join('seeds', 'seed_orders.seed', '=', 'seeds.id')
        ->where('order', '=', $id)->get();
    }
}
