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
    protected $fillable = ['user','seed','score','content'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getUser()
    {
        return $this->attributes['user'];
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

    public function setUser($new_user)
    {
        $this->attributes['user'] = $new_user;
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

    public function user(){
        return $this->belongsTo(user::class);
    }


    public static function validate(Request $request){

        $request->validate([
            "user" => "required|numeric",
            "seed" => "required|numeric",
            "score" => "required|numeric|between:0,5",
            "content" => "required|alpha_num"
        ]);

        Review::create($request->only(['user','seed','score','content']));

    }


    
}