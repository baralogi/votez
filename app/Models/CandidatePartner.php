<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePartner extends Model
{
    use HasFactory;
    protected $fillable = ['sequence_number', 'vision', 'mission', 'is_pass', 'photo'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function getDefaultPhotoLinkAttribute()
    {
        return asset('images/default-image.jpg');
    }

    public function getPhotoLinkAttribute()
    {
        return asset('storage/images/photo/' . $this->photo);
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
}
