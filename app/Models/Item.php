<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Seed;

class Item extends Model
{
    //attributes id, subtotal, quantity, product_id, order_id, created_at, updated_at
    protected $fillable = ['subtotal','quantity'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function getSeedId()
    {
        return $this->attributes['seed_id'];
    }

    public function setSeedId($seed_id)
    {
        $this->attributes['seed_id'] = $seed_id;
    }

    public function getSubTotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubTotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function seed(){
        return $this->belongsTo(Seed::class);
    }
    
}