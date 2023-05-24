<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorAbstractsubmission extends Model
{
    use HasFactory;
    protected $fillable = ['abstractsubmission_id','author_id'];

    public function Abstractsubmissions(){
        return $this->belongsTo(Abstractsubmission::class, 'abstractsubmission_id');
    }

    public function authors(){
        return $this->belongsTo(Author::class, 'author_id');
    }
}
