<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class President extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluation(){
        return $this->hasOne(Evaluation::class);
    }

    public function abstractsubmission(){
        return $this->hasMany(Abstractsubmission::class);
    }

}
