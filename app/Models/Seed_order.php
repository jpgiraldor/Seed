<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed_order extends Model
{
    use HasFactory;
    //attributes id, total, created_at, updated_at
    protected $fillable = ['seed','order','amount'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getSeed()
    {
        return $this->attributes['seed'];
    }

    public function getOrder()
    {
        return $this->attributes['order'];
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

    public function setOrder($new_order)
    {
        $this->attributes['order'] = $new_order;
    }

    public function setAmount($new_amount)
    {
        $this->attributes['amount'] = $new_amount;
    }

    
}