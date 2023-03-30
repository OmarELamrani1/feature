<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abstractsubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'topic_id',
        'keywords',
        'introduction',
        'objective',
        'method',
        'result',
        'conclusion',
        'diagnosis',
        'treatment',
        'discussion',
        'affirmation',
        'disclosure',
        'tracking_code',
        'personne_id',
    ];

    public function topic(){
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function personne(){
        return $this->belongsTo(Personne::class, 'personne_id');
    }

    public function evaluation(){
        return $this->hasOne(Evaluation::class);
    }
}
