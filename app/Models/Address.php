<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Address extends Model{
     use HasFactory;
     protected $fillable = ['user', 'region','city','street','phone','additional_info'];
     
     function getId() {
          return $this->attributes['id'];
     }

     function getUser() {
          return $this->attributes['user'];
     }

     function getRegion() {
          return $this->attributes['region'];
     }
     
     function getCity() {
          return $this->attributes['city'];
     }
     
     function getStreet() {
          return $this->attributes['street'];
     }
     
     function getPhone() {
          return $this->attributes['phone'];
     }
     
     function getAdditionalInfo() {
          return $this->attributes['additional_info'];
     }
     
     
     function setId($id) {
          $this->attributes['id'] = $id;
     }

     function setUser($new_user) {
          $this->attributes['user'] = $new_user;
     }

     function setRegion($new_region) {
          $this->attributes['region'] = $new_region;
     }
     
     function setCity($new_city) {
          $this->attributes['city'] = $new_city;
     }
     
     function setStreet($new_street) {
          $this->attributes['street'] = $new_street;
     }
     
     function setPhone($new_phone) {
          $this->attributes['phone'] = $new_phone;
     }
     
     function setAdditionalInfo($new_additional_info) {
          $this->attributes['additional_info'] = $new_additional_info;
     }
     

     public function user(){
          return $this->belongsTo(User::class);
     }

     public static function validate(Request $request) {
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

