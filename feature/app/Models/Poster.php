<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Poster extends Model
{
    use HasFactory;

    protected $table = 'posters';

    protected $fillable = [
        'path',
        'summary',
        'tracking_code',
        'personne_id'
    ];

    public function personne(){
        return $this->belongsTo(Personne::class, 'personne_id');
    }

    public function url(){
        return Storage::url($this->path);
    }

    public function evaluation(){
        return $this->hasOne(Evaluation::class);
    }
}
