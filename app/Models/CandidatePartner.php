<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePartner extends Model
{
    use HasFactory;
    protected $fillable = ['vision', 'mission'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
