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
                'is_pass' => 1,
                'photo' => 'paslon_1.jpeg'

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
                </ol>',
                'is_pass' => 1,
                'photo' => 'paslon_2.jpeg'
            ],
            [
                'voting_id' => 2,
                'sequence_number' => 1,
                'vision' => '<p>Terwujudnya Dewan Perwakilan Mahasiswa Universitas Dinamika yang progresig, aspiratif, interaktif, dan responsif untuk mencapai kesejahteraan Mahasiswa Universitas Dinamika</p>',
                'mission' => '<ol>
                	<li>Mengoptimalkan kemampuan dan pengetahuan sumber daya internal Dewan Perwakilan Mahasiswa Universitas Dinamika yang berkompeten dan terorganisir dalam menjalankan fungsi dan tugasnya</li>
                    <li>Menjadikan Dewan Perwakilan Mahasiswa sebagai wadah aspirasi mahasiswa dan media yang mengupayakan penyampaian aspirasi Mahasiswa Universitas Dinamika</li>
                    <li>Mengoptimalkan komunikasi internal dan external Dewan Perwakilan Mahasiswa Universitas Dinamika untuk mencapai sinergitas dalam lingkungan Universitas Dinamika</li>
                    <li>Menciptakan Dewan Perwakilan Mahasiswa Universitas Dinamika yang tanggap dengan permasalahan dan isu isu di lingkungan Universitas Dinamika</li>
                </ol>
                ',
                'is_pass' => 1,
                'photo' => 'paslon_3.jpeg'
            ],
            [
                'voting_id' => 2,
                'sequence_number' => 2,
                'vision' => '<p>Terwujudnya DPM-U yang terbuka, sinergis, dan tanggap dalam menjalankan peranya</p>',
                'mission' => '<ol>
                    <li>Meningkatakan kemampuan legislasi pada internal DPM-U</li>
                    <li>Mengoptimalkan komunikasi dengan internal DPM-U dan lembaga eksekutif mahasiswa</li>
                    <li>Tanggap dan terbuka dalam pelaksanaan fungsi dan peran DPM-U</li>
                    <li>Mengoptimalkan forum diskusi dan kajian pada internal DPM-U</li>  
                </ol>',
                'is_pass' => 1,
                'photo' => 'paslon_4.jpeg'
            ],
            [
                'voting_id' => 2,
                'sequence_number' => 3,
                'vision' => '<p>Mewujudkan mahasiswa Milenial yang aktif, kreatif dan bertanggung jawab yang mampu mengembangkan kampus dan masyarakat Indonesia.</p>',
                'mission' => '<ol>
                    <li>Mampu mendukung dan menyelenggarakan kegiatan di kampus dan luar kampus.</li>
                    <li>Menampung aspirasi dan memecahkan masalah mahasiswa dengan prinsip kekeluargaan.</li>
                    <li>Menyelenggarakan program pengembangan bakat dan minat seluruh mahasiswa.</li>
                    <li>Mampu bekerja sama untuk mencapai tujuan BEM sebagai organisasi mahasiswa yang bersinergi.</li>
                </ol>',
                'is_pass' => 1,
                'photo' => 'paslon_5.jpeg'
            ]
        ]);
    }
}
