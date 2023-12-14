<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'uploaded_at',
        // Add any other fields as needed
    ];

    // Additional model logic, relationships, etc. can be added here
}
