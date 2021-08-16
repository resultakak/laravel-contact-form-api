<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'messages';

    /**
     * @var array|string[] $fillable
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'body',
    ];
}
