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

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function getNimAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->nim)) ? $description->nim : '-';
    }

    public function getEmailAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->email)) ? $description->email : '-';
    }

    public function getPhoneAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->phone)) ? $description->phone : '-';
    }

    public function getSexAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->sex)) ? $description->sex : '-';
    }

    public function getAddressAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->address)) ? $description->address : '-';
    }

    public function getBirthPlaceAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->birth_place)) ? $description->birth_place : '-';
    }

    public function getBirthDateAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->birth_date)) ? $description->birth_date : '-';
    }

    public function getFacultyAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->faculty)) ? $description->faculty : '-';
    }

    public function getMajorAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->major)) ? $description->major : '-';
    }

    public function getIpkAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->ipk)) ? $description->ipk : '-';
    }

    public function getSemesterAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->semester)) ? $description->semester : '-';
    }

    public function getSskmAttribute()
    {
        $description = \json_decode($this->description);

        return (isset($description->sskm)) ? $description->sskm : '-';
    }
}
