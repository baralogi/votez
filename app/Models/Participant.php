<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getAuthPassword()
    {
        return $this->token;
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
