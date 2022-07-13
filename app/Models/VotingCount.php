<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingCount extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidate_partner()
    {
        return $this->belongsTo(CandidatePartner::class);
    }
}
