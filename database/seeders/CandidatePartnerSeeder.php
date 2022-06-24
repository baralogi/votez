<?php

namespace Database\Seeders;

use App\Models\CandidatePartner;
use Illuminate\Database\Seeder;

class CandidatePartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CandidatePartner::insert([
            [
                'voting_id' => 1,
                'sequence_number' => 1,
                'vision' => '<p>Menciptakan Lingkungan Organisasi yang proaktif, prestatif, responsif, flexibel, dan transparan untuk mengayomi dan mensejahterakan organisasi kemahasiswaan</p>',
                'mission' => '<ol>
	<li>Mewujudkan Badan Eksekutif Mahasiswa sebagai wadah bagi seluruh Ormawa Universitas Dinamika untuk berkarya, berekspresi, dan berasprirasi demi menapai tujuan ataupun cita cita ormawa di Universitas Dinamika</li>
	<li>Mengajak Ormawa untuk lebih siap dan proaktif dalam menghadapi dunia VUCA (Volatility, Uncertainty, Complexity, dan Ambiguity) guna terciptanya Ormawa yang strategis, berinovasi, dan flexibel</li>
	<li>Meningkatkan prestasi ormawa dan mahasiswa Universitas Dinamika dalam ranah akademik maupun non akademik</li>
</ol>',
                'is_pass' => false

            ],
            [
                'voting_id' => 1,
                'sequence_number' => 2,
                'vision' => '<p>Terwujudnya Badan Eksekutif Mahasiswa yang masif, adaptif, dan progresif sebagai pioner dalam mewujudkan mahasiswa yang aktif dan berkompeten dalam lingkungan kampus maupun masyarakat</p>
',
                'mission' => '<ol>
	<li>Menjadikan Badan Eksekutif Mahasiswa sebagai media pengembangan mahasiswa baik secara internal maupun eksternal</li>
	<li>Mengoptimalkan pemberdayaan internal Badan Eksekutif Mahasiswa dan Ormawa yang berada dibawah naungan Universitas</li>
	<li>Meningkatkan kolaborasi antar lembaga legislatif, ormawa dengan Badan Eksekutif Mahasiswa</li>
</ol>'
            ],
            [
                'voting_id' => 2,
                'sequence_number' => 1,
                'vision' => '<p>Terwujudnya Dewan Perwakilan Mahasiswa Universitas Dinamika yang progresig, aspiratif, interaktif, dan responsif untuk mencapai kesejahteraan Mahasiswa Universitas Dinamika</p>',
                'mission' => '<ol>
	<li>Mengoptimalkan kemampuan dan pengetahuan sumber daya internal Dewan Perwakilan Mahasiswa Universitas Dinamika yang berkompeten dan terorganisir dalam menjalankan fungsi dan tugasnya</li>
</ol>
'
            ]
        ]);
    }
}
