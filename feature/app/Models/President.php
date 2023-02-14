<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class President extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluation(){
        return $this->hasOne(Evaluation::class);
    }

}
