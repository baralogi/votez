<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingCount extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidatePartner()
    {
        return $this->belongsTo(CandidatePartner::class);
    }
}
