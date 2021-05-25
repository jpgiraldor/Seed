<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Seed extends Model
{
    use HasFactory;
    //attributes id, name, brand, weight, water, ground, drought, germination, type, keywords, category, price, created_at, updated_at
    protected $fillable = [
        'name',
        'brand',
        'weight',
        'water',
        'ground',
        'drought',
        'germination',
        'type',
        'keywords',
        'category',
        'price'
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function getWeight()
    {
        return $this->attributes['weight'];
    }

    public function getWater()
    {
        return $this->attributes['water'];
    }

    public function getGround()
    {
        return $this->attributes['ground'];
    }

    public function getDrought()
    {
        return $this->attributes['drought'];
    }

    public function getGermination()
    {
        return $this->attributes['germination'];
    }

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function getKeywords()
    {
        return $this->attributes['keywords'];
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    #----------------------------------------------------------

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function setName($name) : self
    {
        return $this->attributes['name'] = $name;
    }

    public function setBrand($brand) : self
    {
        return  $this->attributes['brand'] = $brand;
    }

    public function setWeight($weight) : self
    {
        return  $this->attributes['weight'] = $weight;
    }

    public function setWater($water) : self
    {
        return  $this->attributes['water'] = $water;
    }

    public function setGround($ground) : self
    {
        return  $this->attributes['ground'] = $ground;
    }

    public function setDrought($drought) : self
    {
        return   $this->attributes['drought'] = $drought;
    }

    public function setGermination($germination) : self
    {
        return   $this->attributes['germination'] = $germination;
    }

    public function setType($type) : self
    {
        return $this->attributes['type'] = $type;
    }

    public function setKeywords($keywords) : self
    {
        return $this->attributes['keywords'] = $keywords;
    }

    public function setCategory($category) : self
    {
        return $this->attributes['category'] = $category;
    }

    public function setPrice($price) : self
    {
        return $this->attributes['price'] = $price;
    }


    public function seedOrders()
    {
        return $this->hasMany(Seed_orders::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|alpha_num",
            "brand" => "required|alpha_num",
            "weight" => "required|numeric",
            "water" => "required|numeric",
            "ground" => "required|alpha_num",
            "drought" => "required|alpha_num",
            "germination" => "required|numeric",
            "type" => "required|alpha",
            "keywords" => "required|alpha",
            "category" => "required|alpha",
            "price" => "required|numeric"
            ]);
            Seed::create($request->only(['name','brand','weight','water','ground','drought','germination','type','keywords','category','price']));
    }

    public static function byPrice()
    {
        return Seed::orderBy('price', 'DESC')->get();
    }

    public static function byWater()
    {
        return Seed::orderBy('water', 'DESC')->get();
    }

    public static function byGermination()
    {
        return Seed::orderBy('germination', 'DESC')->get();
    }

    public static function search($name)
    {
        return Seed::where('name', 'LIKE', $name)->get();
    }

    public static function byPop()
    {
        $popCount = [];

        $orders = SeedOrders::all();
        foreach ($orders as $ord) {
            $seed = $ord->getSeed();
            if (isset($popCount[$seed]) == null) {
                $popCount[$seed] = 0;
            }
            $popCount[$seed] += 1;
        }

    
        $cmp = function ($entry, $key) use ($popCount) {
            $seedID = $entry->getId();
            return $popCount[$seedID];
        };

        $seeds = array_keys($popCount);
        return Seed::whereIn('id', $seeds)->get()->sortByDesc($cmp);
    }

    public static function byScore()
    {
        $acumPop = [];
        $popCount = [];

        $reviews = Review::all();
        
        foreach ($reviews as $rev) {
            $score = $rev->getScore();
            $seed = $rev->getSeed();
            
            if (isset($acumPop[$seed]) == null) {
                $acumPop[$seed] = 0;
                $popCount[$seed] = 0;
            }

            $acumPop[$seed] += $score;
            $popCount[$seed] += 1;
        }

    
        $cmp = function ($entry, $key) use ($acumPop, $popCount) {
            $seedID = $entry->getId();
            return $acumPop[$seedID]/$popCount[$seedID];
        };

        $seeds = array_keys($acumPop);
        return Seed::whereIn('id', $seeds)->get()->sortByDesc($cmp);
    }
}
