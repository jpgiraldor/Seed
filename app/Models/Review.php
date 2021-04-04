<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Item;

class Review extends Model
{
    use HasFactory;
    //attributes id, total, created_at, updated_at
    protected $fillable = ['customer','seed','score','content'];

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


    public static function validate(Request $request){
        echo $request."hola";
        $request->validate([
            "score" => "required|alpha_num",
            "content" => "required|numeric|between:0,5",
            "customer" => "required",
            "seed" => "required"
            ]);
        echo $request;

    }


    
}