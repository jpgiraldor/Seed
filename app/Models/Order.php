<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Order extends Model
{
    use HasFactory;
    //attributes id, total, date, ship_addr,, user, seed_orders created_at, updated_at
    protected $fillable = [
        'total',
        'user',
        'date',
        'ship_addr',
        'seed_orders'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function getShipAddr()
    {
        return $this->attributes['ship_addr'];
    }



#-----------------------------------------------------



    public function setTotal($new_total)
    {
        $this->attributes['total'] = $new_total;
    }

    public function setDate($new_date)
    {
        $this->attributes['date'] = $new_date;
    }

    public function setShipAddr($new_ship_addr)
    {
        $this->attributes['ship_addr'] = $new_ship_addr;
    }

    public function seedOrders()
    {
        return $this->hasMany(SeedOrders::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public static function validate($params)
    {
        $total = $params['total'];
        $user = $params['user'];
        $ship_addr = $params['ship_addr'];

        return Order::create([
            'total' => $total,
            'user' => $user,
            'date' => date("Y-m-d H:i:s"),
            'ship_addr' => $ship_addr,
        ]);
    }

    public static function getOrders($id)
    {
        return Order::where('user', $id)->get();
    }
}
