<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Item;

class Review extends Model
{
    use HasFactory;
    //attributes id, score, content, seed, user, created_at, updated_at
    protected $fillable = [
        'user',
        'seed',
        'score',
        'content'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function getContent()
    {
        return $this->attributes['content'];
    }

    public function getSeed()
    {
        return $this->attributes['seed'];
    }
#----------------------------------------------------------------
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setScore($new_score)
    {
        $this->attributes['score'] = $new_score;
    }

    public function setContent($new_content)
    {
        $this->attributes['content'] = $new_content;
    }

    public function setSeed($seed)
    {
        $this->attributes['seed'] = $seed;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seed()
    {
        return $this->belongsTo(Seed::class);
    }

    public static function validate(Request $request)
    {

        $request->validate([
            "user" => "required|numeric",
            "seed" => "required|numeric",
            "score" => "required|numeric|between:0,5",
            "content" => "required|string"
        ]);

        Review::create($request->only(['user','seed','score','content']));
    }
}
