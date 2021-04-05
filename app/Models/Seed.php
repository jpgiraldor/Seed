<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Seed extends Model{
    use HasFactory;

    protected $fillable = ['name','brand','weight','water','ground','drought','germination','type','keywords','category','price'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->attributes['name'];
    }

    /**
     * Set the value of name
     *
     * @return self
     */
    public function setName($name) : self
    {
        return $this->attributes['name'] = $name;

    }

    /**
     * Get the value of brand
     */
    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    /**
     * Set the value of brand
     *
     * @return self
     */
    public function setBrand($brand) : self
    {
        return  $this->attributes['brand'] = $brand;

    }

    /**
     * Get the value of weight
     */
    public function getWeight()
    {
        return $this->attributes['weight'];
    }

    /**
     * Set the value of weight
     *
     * @return self
     */
    public function setWeight($weight) : self
    {
        return  $this->attributes['weight'] = $weight;

    }

    /**
     * Get the value of water
     */
    public function getWater()
    {
        return $this->attributes['water'];
    }

    /**
     * Set the value of water
     *
     * @return self
     */
    public function setWater($water) : self
    {
        return  $this->attributes['water'] = $water;

    }

    /**
     * Get the value of ground
     */
    public function getGround()
    {
        return $this->attributes['ground'];
    }

    /**
     * Set the value of ground
     *
     * @return self
     */
    public function setGround($ground) : self
    {
        return  $this->attributes['ground'] = $ground;

    }

    /**
     * Get the value of drought
     */
    public function getDrought()
    {
        return $this->attributes['drought'];
    }

    /**
     * Set the value of drought
     *
     * @return self
     */
    public function setDrought($drought) : self
    {
        return   $this->attributes['drought'] = $drought;

    }

    /**
     * Get the value of germination
     */
    public function getGermination()
    {
        return $this->attributes['germination'];
    }

    /**
     * Set the value of germination
     *
     * @return self
     */
    public function setGermination($germination) : self
    {
        return   $this->attributes['germination'] = $germination;

    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->attributes['type'];
    }

    /**
     * Set the value of type
     *
     * @return self
     */
    public function setType($type) : self
    {
        return $this->attributes['type'] = $type;

    }

    /**
     * Get the value of keywords
     */
    public function getKeywords()
    {
        return $this->attributes['keywords'];
    }

    /**
     * Set the value of keywords
     *
     * @return self
     */
    public function setKeywords($keywords) : self
    {
        return $this->attributes['keywords'] = $keywords;

    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->attributes['category'];
    }

    /**
     * Set the value of category
     *
     * @return self
     */
    public function setCategory($category) : self
    {
        return $this->attributes['category'] = $category;

    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->attributes['price'];
    }

    /**
     * Set the value of price
     *
     * @return self
     */
    public function setPrice($price) : self
    {
        return $this->attributes['price'] = $price;
    }

    public function seed_order(){
        return $this->hasMany(Seed_order::class);
        }

    public function review(){
        return $this->hasMany(Review::class);
        } 

    public static function validate($request){
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

    public static function by_price(){
        return Seed::orderBy('price', 'DESC')->get();
    }

    public static function by_water(){
        return Seed::orderBy('water', 'DESC')->get();
    }

    public static function by_germination(){
        return Seed::orderBy('germination', 'DESC')->get();
    }

    public static function search($name){
        return Seed::where('name', 'LIKE', $name)->get();
    }

    public static function by_score(){
        $data["review"] = Review::all();
        foreach ($data["review"] as $value) {
            echo $value->getScore();
        }
    }
}