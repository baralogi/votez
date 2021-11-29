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

    public function getLogoLinkAttribute()
    {
        return asset('storage/images/logo/' . $this->logo);
    }

    public function getDefaultLogoLinkAttribute()
    {
        return asset('images/voting_logo.png');
    }
}
