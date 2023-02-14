<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'poster_id',
        'president_id'
    ];

    public function poster(){
        return $this->belongsTo(Poster::class, 'poster_id');
    }

    public function president(){
        return $this->belongsTo(President::class, 'president_id');
    }
}
