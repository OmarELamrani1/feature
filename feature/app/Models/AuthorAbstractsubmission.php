<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorAbstractsubmission extends Model
{
    use HasFactory;
    protected $fillable = ['abstractsubmission_id','author_id'];
}
