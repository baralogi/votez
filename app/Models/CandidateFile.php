<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateFile extends Model
{
    use HasFactory;

    const SK_AK = 'SURAT KETERANGAN AKTIF';
    const TK_NILAI = 'TRANSKRIP NILAI';
    const LKMM_TD = 'SERTIFIKAT LKMM-TD';
    const SK_ORG = 'SURAT KETERANGAN AKTIF ORGANISASI';
    const P_ORG = 'PENGALAMAN ORGANISASI';
    const B_KOALISI = 'BUKTI KOALISI ORMAWA';
    protected $fillable = ['candidate_id', 'filename', 'filetype'];


    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
