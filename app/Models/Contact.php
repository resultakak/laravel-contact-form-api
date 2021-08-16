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
    protected string $table = 'messages';

    /**
     * @var array|string[] $fillable
     */
    protected array $fillable = [
        'name',
        'email',
        'subject',
        'body',
    ];
}
