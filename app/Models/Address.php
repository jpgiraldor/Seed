<?php
     namespace App\Models;
     use Illuminate\Database\Eloquent\Factories\HasFactory;
     use Illuminate\Database\Eloquent\Model;
     class Address extends Model{
          use HasFactory;
          protected $fillable = ['region','city','street','phone','additional_info','cust'];
          
          function getRegion() {
               return $this->atributes['region'];
          }
          
          function getCity() {
               return $this->atributes['city'];
          }
          
          function getStreet() {
               return $this->atributes['street'];
          }
          
          function getPhone() {
               return $this->atributes['phone'];
          }
          
          function getAdditionalInfo() {
               return $this->atributes['additional_info'];
          }
          
          function getCust() {
               return $this->atributes['cust'];
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
          
          function setCust($new_cust) {
               $this->attributes['cust'] = $new_cust;
          }

     }          

?>