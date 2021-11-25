<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
