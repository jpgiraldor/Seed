<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Address extends Model
{
     use HasFactory;

     //attributes id, region, city, street, phone, additional_info, user, created_at, updated_at
     protected $fillable = [
          'user',
          'region',
          'city',
          'street',
          'phone',
          'additional_info'
     ];
     
     public function getId()
     {
         return $this->attributes['id'];
     }



     public function getRegion()
     {
         return $this->attributes['region'];
     }
     
     public function getCity()
     {
         return $this->attributes['city'];
     }
     
     public function getStreet()
     {
         return $this->attributes['street'];
     }
     
     public function getPhone()
     {
         return $this->attributes['phone'];
     }
     
     public function getAdditionalInfo()
     {
         return $this->attributes['additional_info'];
     }
     
     
     public function setId($id)
     {
         $this->attributes['id'] = $id;
     }



     public function setRegion($new_region)
     {
         $this->attributes['region'] = $new_region;
     }
     
     public function setCity($new_city)
     {
         $this->attributes['city'] = $new_city;
     }
     
     public function setStreet($new_street)
     {
         $this->attributes['street'] = $new_street;
     }
     
     public function setPhone($new_phone)
     {
         $this->attributes['phone'] = $new_phone;
     }
     
     public function setAdditionalInfo($new_additional_info)
     {
         $this->attributes['additional_info'] = $new_additional_info;
     }
     

     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public static function validate(Request $request)
     {
         if ($request["additional_info"] == null) {
             $request["additional_info"] = '';
         }

          $request->validate([
              "user" => "required|numeric|min:0",
              "region" => "required|string",
              "city" => "required|string",
              "street" => "required|string",
              "phone" => "required|alpha_num",
              "additional_info" => "alpha_num|nullable"
          ]);
   
          Address::create($request->only([
               'user','region','city',
               'street', 'phone', 'additional_info'
          ]));
     }
}
