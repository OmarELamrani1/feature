<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];

    public function poster(){
        return $this->hasMany(Poster::class);
    }

    public function abstractsubmission(){
        return $this->hasMany(Abstractsubmission::class);
    }
}
