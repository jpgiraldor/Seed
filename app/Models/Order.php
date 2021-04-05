<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Order extends Model
{
    use HasFactory;
    //attributes id, total, created_at, updated_at
    protected $fillable = ['total','user','date','ship_addr','acc','seed_order'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getUser()
    {
        return $this->attributes['user'];
    }

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function getShip_addr()
    {
        return $this->attributes['ship_addr'];
    }

    public function getAcc()
    {
        return $this->attributes['acc'];
    }

    public function getSeed_order()
    {
        return $this->attributes['seed_order'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

#-----------------------------------------------------

    public function setUser($new_user)
    {
        $this->attributes['user'] = $new_user;
    }

    public function setTotal($new_total)
    {
        $this->attributes['total'] = $new_total;
    }

    public function setDate($new_date)
    {
        $this->attributes['date'] = $new_date;
    }

    public function setShip_addr($new_ship_addr)
    {
        $this->attributes['ship_addr'] = $new_ship_addr;
    }

    public function setAcc($new_acc)
    {
        $this->attributes['acc'] = $new_acc;
    }

    public function setSeed_order($new_seed_order)
    {
        $this->attributes['seed_order'] = $new_seed_order;
    }

    public function seed_order(){
        return $this->hasMany(Seed_order::class);
    } 

    public function user(){
        return $this->belongsTo(user::class);
    }
    
}