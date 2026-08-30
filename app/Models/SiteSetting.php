<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public static function publicContent(): array
    {
        return [
            'home_title' => 'Selamat Datang di Website Eskul Musik',
            'home_subtitle' => 'Tempat mengembangkan bakat musik siswa SMKN 1 Dukuhturi.',
            'home_stat_1_title' => 'Latihan Rutin',
            'home_stat_1_text' => 'Kegiatan musik yang terarah dan menyenangkan.',
            'home_stat_2_title' => 'Dokumentasi',
            'home_stat_2_text' => 'Momen kegiatan dan penampilan siswa.',
            'home_stat_3_title' => 'Karya Siswa',
            'home_stat_3_text' => 'Ruang untuk belajar, tampil, dan berkembang.',
            'home_activity_heading' => 'Kegiatan Kami',
            'home_activity_text' => 'Berbagai kegiatan Eskul Musik SMKN 1 Dukuhturi.',
            'home_article_heading' => 'Artikel Terbaru',

            'gallery_title' => 'Galeri',
            'gallery_subtitle' => 'Dokumentasi kegiatan Eskul Musik.',
            'gallery_heading' => 'Dokumentasi Kegiatan',
            'gallery_text' => 'Kumpulan foto kegiatan, latihan, dan penampilan siswa.',

            'article_title' => 'Artikel',
            'article_subtitle' => 'Informasi dan cerita terbaru seputar Eskul Musik.',
            'article_heading' => 'Artikel Terbaru',

            'profile_title' => 'Profil Eskul Musik',
            'profile_subtitle' => 'Mengenal kegiatan dan semangat bermusik siswa SMKN 1 Dukuhturi.',
            'profile_intro_title' => 'Eskul Musik',
            'profile_intro_text' => 'Wadah siswa untuk belajar, berkarya, dan berkembang lewat musik.',
            'profile_about' => 'Eskul Musik merupakan tempat bagi siswa SMKN 1 Dukuhturi untuk mengembangkan bakat dalam bidang musik, baik vokal maupun instrumen.',
            'profile_activities' => "Latihan band\nPaduan suara\nPentas musik\nDokumentasi kegiatan",
            'profile_vision' => 'Menjadi ekstrakurikuler yang kreatif, disiplin, dan berprestasi dalam bidang musik.',
            'profile_mission' => "Mengembangkan bakat musik siswa\nMelatih kerja sama dan kedisiplinan\nMemberi ruang tampil dan berkarya",
            'profile_board' => "Pembina Eskul Musik\nKetua Eskul\nSekretaris\nBendahara",
            'profile_schedule' => 'Latihan rutin dilaksanakan sesuai jadwal kegiatan sekolah.',
            'profile_benefits' => "Percaya diri\nKerja sama\nKreativitas\nKedisiplinan",
            'instagram_url' => 'https://www.instagram.com/',
            'instagram_label' => '@eskulmusik',
        ];
    }
}
