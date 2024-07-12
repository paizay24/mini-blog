<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $fillable =['title', 'description'];

    // Indicates if the model should be timestamped
    public $timestamps = true;
}
