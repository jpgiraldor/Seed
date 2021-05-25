<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    //attributes id, firstname, lastname, username, password, email, wallet, reviews, addresses, admin, orders, created_at, updated_at
    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'wallet',
        'addresses',
        'reviews',
        'admin'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = ['email_verified_at' => 'datetime',];



    public function getId() 
    {
        return $this->attributes['id'];
    }
    
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    
    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }
    
    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    public function getFirstname()
    {
        return $this->attributes['firstname'];
    }
    
    public function setFirstname($firstname)
    {
        $this->attributes['firstname'] = $firstname;
    }

    public function getLastname()
    {
        return $this->attributes['lastname'];
    }
    
    public function setLastname($lastname)
    {
        $this->attributes['lastname'] = $lastname;
    }

    public function getWallet()
    {
        return $this->attributes['wallet'];
    }
    
    public function setWallet($wallet)
    {
        $this->attributes['wallet'] = $wallet;
    }

    public function isAdmin()
    {
        return $this->attributes['admin'];
    }

    public static function validate($request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|alpha_num",
            "firstname" => "required|alpha",
            "lastname" => "required|alpha",
            "wallet" => "required|numeric",
        ]);

        User::create($request->only(
            ["email","password","firstname","lastname","wallet"]
        ));
    }
    
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
