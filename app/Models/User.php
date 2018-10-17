<?php

namespace App\Models;

use Eloquent as Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'email',
        'first_name',
        'last_name',
        'is_host',
        'date_of_birth'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_host' => 'boolean',
        'date_of_birth' => 'date'
    ];
    
}
