<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',
        'abstractsubmission_id',
        'president_id',
        'file'
    ];

    public function abstractsubmission(){
        return $this->belongsTo(Abstractsubmission::class, 'abstractsubmission_id');
    }

    public function president(){
        return $this->belongsTo(President::class, 'president_id');
    }

    public function url(){
        return Storage::url($this->file);
    }
}
