<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'token', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->token;
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
