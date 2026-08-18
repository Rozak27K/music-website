<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function defaults(): array
    {
        return [
            'home_title' => 'Selamat Datang di Website Eskul Musik',
            'home_subtitle' => 'Tempat mengembangkan bakat musik siswa',
            'home_stat_1_title' => 'Band',
            'home_stat_1_text' => 'Latihan aransemen dan panggung',
            'home_stat_2_title' => 'Padus',
            'home_stat_2_text' => 'Vokal, harmoni, dan kekompakan',
            'home_stat_3_title' => 'Event',
            'home_stat_3_text' => 'Dokumentasi penampilan sekolah',
            'home_activity_heading' => 'Kegiatan Kami',
            'home_activity_text' => 'Pilih salah satu kegiatan untuk melihat dokumentasi galeri.',
            'home_article_heading' => 'Artikel',

            'profile_title' => 'Profil Ekstrakurikuler Musik',
            'profile_subtitle' => 'Mengenal lebih dekat tentang kami',
            'profile_intro_title' => 'Musik yang tumbuh bareng teman.',
            'profile_intro_text' => 'Tempat siswa belajar ritme, suara, kerja sama, dan berani tampil.',
            'profile_about' => 'Ekstrakurikuler Musik adalah wadah bagi siswa untuk menyalurkan minat dan bakat di bidang musik serta melatih kreativitas, kerja sama, dan kepercayaan diri.',
            'profile_activities' => "Latihan Band\nLatihan Paduan Suara\nPenampilan event sekolah\nPengisi hiburan acara tertentu",
            'profile_vision' => 'Menjadikan ekskul musik sebagai ruang kreatif, solid, dan menyenangkan.',
            'profile_mission' => "Mengembangkan bakat musik anggota\nMembangun kekompakan\nTampil di acara sekolah",
            'profile_board' => "Ketua: Annisa Nisfi Ramadani\nWakil: Novtriza Aquila Asha\nSekretaris 1: Melisa Ayu Setio Wati\nSekretaris 2: Faizah Azzahra\nBendahara 1: Qisa Nahla Billah\nBendahara 2: Kayla Salfana",
            'profile_schedule' => 'Setiap hari Selasa setelah jam pelajaran',
            'profile_benefits' => "Mengembangkan bakat\nMelatih percaya diri\nMenambah pengalaman tampil\nMemperluas pertemanan",
            'instagram_url' => 'https://www.instagram.com/p/DSxgmWIiRhr/?utm_source=ig_web_copy_link',
            'instagram_label' => '@musiksmeskarofficial',

            'gallery_title' => 'Galeri Eskul Musik',
            'gallery_subtitle' => 'Dokumentasi kegiatan dan penampilan kami',
            'gallery_heading' => 'Momen Eskul Musik',
            'gallery_text' => 'Filter kategori untuk melihat foto kegiatan yang kamu cari.',

            'article_title' => 'Artikel Eskul Musik',
            'article_subtitle' => 'Informasi, kegiatan, dan manfaat mengikuti ekstrakurikuler musik',
            'article_heading' => 'Artikel Eskul Musik',
        ];
    }

    public static function publicContent(): array
    {
        $settings = self::query()->pluck('value', 'key')->toArray();

        return array_merge(self::defaults(), $settings);
    }

    public static function updateContent(array $content): void
    {
        foreach (self::defaults() as $key => $default) {
            self::updateOrCreate(
                ['key' => $key],
                ['value' => $content[$key] ?? $default]
            );
        }
    }
}
