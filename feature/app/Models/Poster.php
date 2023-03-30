<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Poster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posters';

    protected $fillable = [
        'path',
        'summary',
        'tracking_code',
        'personne_id',
        'topic_id'
    ];

    public function personne(){
        return $this->belongsTo(Personne::class, 'personne_id');
    }

    public function topic(){
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function url(){
        return Storage::url($this->path);
    }

    public function evaluation(){
        return $this->hasOne(Evaluation::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function(Poster $poster){
            $poster->evaluation()->delete();
        });
    }
}
