<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',
        'abstractsubmission_id',
        'president_id'
    ];

    public function abstractsubmission(){
        return $this->belongsTo(Abstractsubmission::class, 'abstractsubmission_id');
    }

    public function president(){
        return $this->belongsTo(President::class, 'president_id');
    }
}
