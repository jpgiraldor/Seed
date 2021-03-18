<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model{
    use HasFactory;
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['id','username', 'password','email','firstname','lastname','wallet'];
    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getUsername(){
        return $this->attributes['username'];
    }

    public function setName($username){
        $this->attributes['username'] = $username;
    }

    public function getPassword(){
        return $this->attributes['password'];
    }
    
    public function setPassword($password){
        $this->attributes['password'] = $password;
    }

    public function getEmail(){
        return $this->attributes['email'];
    }
    
    public function setEmail($email){
        $this->attributes['email'] = $email;
    }

    public function getFirstname(){
        return $this->attributes['firstname'];
    }
    
    public function setFirstname($firstname){
        $this->attributes['firstname'] = $firstname;
    }

    public function getLastname(){
        return $this->attributes['lastname'];
    }
    
    public function setLastname($lastname){
        $this->attributes['lastname'] = $lastname;
    }

    public function getWallet(){
        return $this->attributes['wallet'];
    }
    
    public function setWallet($wallet){
        $this->attributes['wallet'] = $wallet;
    }

    public static function validate($request){
        $request->validate([
            "username" => "required|alpha_num",
            "password" => "required|alpha_num",
            "firstname" => "required|alpha",
            "lastname" => "required|alpha",
            "email" => "required|email",
            "wallet" => "required|numeric"
            ]);
            Customer::create($request->only(["username","password","email","firstname","lastname","wallet"]));
    }
    
/*     public function comments(){
        return $this->hasMany(Comment::class);
        } */
}