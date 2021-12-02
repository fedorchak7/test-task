<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Template extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'body',
        'user_id',
    ];

    public function user(): HasOne
    {
        return $this->HasOne(User::class, 'id', 'user_id');
    }
}
