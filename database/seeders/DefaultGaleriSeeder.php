<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class DefaultGaleriSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'judul' => 'Latihan Band',
                'deskripsi' => 'Sesi latihan instrumen, aransemen lagu, dan kekompakan antar pemain.',
                'kategori' => 'Band',
                'gambar' => 'band.jpeg',
            ],
            [
                'judul' => 'Sesi Vokal',
                'deskripsi' => 'Latihan vokal untuk melatih teknik suara, harmoni, dan percaya diri.',
                'kategori' => 'Band',
                'gambar' => 'aniss.jpeg',
            ],
            [
                'judul' => 'Pentas Sekolah',
                'deskripsi' => 'Penampilan musik dalam kegiatan sekolah sebagai ruang ekspresi siswa.',
                'kategori' => 'Event',
                'gambar' => 'event.jpeg',
            ],
            [
                'judul' => 'Kegiatan Sekolah',
                'deskripsi' => 'Dokumentasi kegiatan musik yang mendukung acara dan suasana sekolah.',
                'kategori' => 'Event',
                'gambar' => 'event1.jpeg',
            ],
            [
                'judul' => 'Penampilan Musik',
                'deskripsi' => 'Momen tampil bersama untuk menunjukkan hasil latihan ekstrakurikuler.',
                'kategori' => 'Event',
                'gambar' => 'tampil.jpeg',
            ],
            [
                'judul' => 'Paduan Suara',
                'deskripsi' => 'Latihan dan penampilan vokal kelompok dengan harmoni yang kompak.',
                'kategori' => 'Paduan Suara',
                'gambar' => 'padus.jpeg',
            ],
            [
                'judul' => 'Latihan Harmoni',
                'deskripsi' => 'Proses latihan bersama untuk menyatukan vokal, tempo, dan rasa musikal.',
                'kategori' => 'Paduan Suara',
                'gambar' => 'rayis.jpeg',
            ],
            [
                'judul' => 'Foto Bersama',
                'deskripsi' => 'Kebersamaan anggota ekstrakurikuler musik SMKN 1 Dukuhturi.',
                'kategori' => 'Paduan Suara',
                'gambar' => 'foto bareng.jpeg',
            ],
        ];

        foreach ($items as $item) {
            Galeri::firstOrCreate(
                ['gambar' => $item['gambar']],
                $item
            );
        }
    }
}
