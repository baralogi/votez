<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function voting()
    {
        return $this->belongsTo(Voting::class);
    }

    public function votingCounts()
    {
        return $this->hasMany(VotingCount::class);
    }

    public function candidateFiles()
    {
        return $this->hasMany(CandidateFile::class);
    }
}
