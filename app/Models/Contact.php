<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'work_place',
        'address',
        'user_id',
    ];

    public function user(): HasOne
    {
        return $this->HasOne(User::class, 'id', 'user_id');
    }
}
