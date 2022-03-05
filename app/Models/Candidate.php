<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    const CHAIRMAN = 'KETUA';
    const VICE = 'WAKIL KETUA';
    protected $fillable = ['user_id', 'voting_id', 'candidate_partner_id', 'name', 'status', 'description'];

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

    public function candidatePartner()
    {
        return $this->belongsTo(CandidatePartner::class);
    }

    public function getPhotoLinkAttribute()
    {
        return asset('storage/images/photo/' . $this->logo);
    }

    public function getDefaultPhotoLinkAttribute()
    {
        return asset('images/avatar-4.png');
    }

    public function getIsPassStatusAttribute()
    {
        if ($this->is_pass === true) {
            return 'Lolos';
        } else if ($this->is_pass === false) {
            return 'Tidak Lolos';
        }

        return 'Belum Terseleksi';
    }

    public function getVisiAttribute()
    {
        $description = \json_decode($this->description);
        return $description->visi;
    }

    public function getMisiAttribute()
    {
        $description = \json_decode($this->description);
        return $description->misi;
    }
}
