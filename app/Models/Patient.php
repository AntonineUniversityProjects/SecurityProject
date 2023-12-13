<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'birthdate',
        // Add other fields as needed
    ];

    // You can define additional methods, relationships, or scopes here
}
