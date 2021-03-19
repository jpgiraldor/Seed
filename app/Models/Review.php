<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Review extends Model
{
    use HasFactory;
    //attributes id, total, created_at, updated_at
    protected $fillable = ['customer','seed','score','content','acc'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getCustomer()
    {
        return $this->attributes['customer'];
    }

    public function getSeed()
    {
        return $this->attributes['seed'];
    }

    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function getContent()
    {
        return $this->attributes['content'];
    }

    public function getAcc()
    {
        return $this->attributes['acc'];
    }
#----------------------------------------------------------------
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setCustomer($new_customer)
    {
        $this->attributes['customer'] = $new_customer;
    }

    public function setSeed($new_seed)
    {
        $this->attributes['seed'] = $new_seed;
    }

    public function setScore($new_score)
    {
        $this->attributes['score'] = $new_score;
    }

    public function setContent($new_content)
    {
        $this->attributes['content'] = $new_content;
    }

    public function setAcc($new_acc)
    {
        $this->attributes['acc'] = $new_acc;
    }



    
}