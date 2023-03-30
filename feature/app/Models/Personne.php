<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Personne extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['resume', 'contact', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function poster(){
        return $this->hasOne(Poster::class);
    }

    public function abstractsubmission(){
        return $this->hasOne(Abstractsubmission::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function(Personne $personne){
            $personne->poster()->delete();
        });
    }

}
