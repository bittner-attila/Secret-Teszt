<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    use HasFactory;

    public $timestamps = true;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = null;

    protected $fillable = [
        'hash',
        'secretText',
        'expiresAt',
        'remainingViews',
    ];

    public static function findActiveSecretByHash($hash)
    {
        return Secret::where('hash', $hash)
        ->where('remainingViews', '>', 0)
        ->where('expiresAt', '>', '2020-10-10')
        ->orWhere('expiresAt', '=', null)->first();
    }
}
