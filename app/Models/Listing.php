<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    //in order to mass insert into database, column must be provided here.
    protected $fillable = ['title','user_id', 'logo', 'company', 'location', 'website' , 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters){
       if($filters['tag'] ?? false){
        $query->where('tags','like', '%'. request('tag'). '%');
       }

       if($filters['search'] ?? false){
        $query->where('title','like', '%'. request('search'). '%')
        ->orWhere('tags', 'like', '%' . request('search') . '%')
        ->orWhere('description', 'like', '%' . request('search') . '%')
        ->orWhere('company', 'like', '%' . request('search') . '%')
        ->orWhere('location', 'like', '%' . request('search') . '%');
       }
    }
    //Relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
