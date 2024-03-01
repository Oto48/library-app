<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add 'name' attribute here
        'release_date',
        'status',
        'authors', // Assuming 'authors' is also mass assignable
    ];
    
    protected $casts = [
        'authors' => 'array',
    ];
}
