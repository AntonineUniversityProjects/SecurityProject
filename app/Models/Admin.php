<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password', // You should hash the password before saving it to the database
        // Add other fields as needed
    ];

    // You can define additional methods, relationships, or scopes here
}
