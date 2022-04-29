<?php

namespace App\Models;

use App\Helpers\DateFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Voting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function candidatePartners()
    {
        return $this->hasMany(CandidatePartner::class);
    }

    public function getLogoLinkAttribute()
    {
        return asset('storage/images/logo/' . $this->logo);
    }

    public function getDefaultLogoLinkAttribute()
    {
        return asset('images/voting_logo.png');
    }

    public function getStartAtFormatAttribute()
    {
        return DateFormat::indonesianFormatDate($this->start_at);
    }

    public function getEndAtFormatAttribute()
    {
        return DateFormat::indonesianFormatDate($this->end_at);
    }

    public function getVotingStatusAttribute()
    {
        $startDate = Carbon::createFromFormat('Y-m-d', $this->start_at);
        $endDate = Carbon::createFromFormat('Y-m-d', $this->end_at);

        $check = Carbon::now()->between($startDate, $endDate);

        if ($check) {
            return 'Aktif';
        }

        return 'Tidak Aktif';
    }
}
