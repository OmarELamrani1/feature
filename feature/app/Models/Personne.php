<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Personne extends Model
{
    use HasFactory;
    protected $fillable = ['resume', 'contact', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function poster(){
        return $this->hasOne(Poster::class);
    }

}
