@extends('layouts.app')

@section('title', 'Profil | Eskul Musik')

@section('content')

<x-page-hero
    title="Profil Ekstrakurikuler Musik"
    subtitle="Mengenal lebih dekat tentang kami"
/>

<!-- CONTENT -->
<section class="container py-5">
    <div class="row g-4 justify-content-center align-items-start">

        <!-- LOGO -->
        <div class="col-md-4 text-center">
            <img src="{{ asset('image/musiklogo.png') }}" class="logo-img" alt="Logo Musik">
        </div>

        <!-- KIRI -->
        <div class="col-md-4">
            <div class="card profile-card shadow p-4">

                @php
                $kiri = [
                    [
                        'title' => 'Tentang Kami',
                        'content' => '<p class="text-center">
                            Ekstrakurikuler Musik adalah wadah bagi siswa untuk menyalurkan
                            minat dan bakat di bidang musik serta melatih kreativitas,
                            kerja sama, dan kepercayaan diri.
                        </p>'
                    ],
                    [
                        'title' => 'Kegiatan',
                        'content' => '<ul>
                            <li>Latihan Band</li>
                            <li>Latihan Paduan Suara</li>
                            <li>Penampilan event sekolah</li>
                            <li>Pengisi hiburan acara tertentu</li>
                        </ul>'
                    ]
                ];
                @endphp

                @foreach ($kiri as $item)
                <x-content-card :title="$item['title']" class="mb-3">
                    {!! $item['content'] !!}
                </x-content-card>
                @endforeach

                <!-- SOCIAL -->
                <x-content-card title="Instagram" class="text-center">
                    <div class="social-icons">
                        <a href="https://www.instagram.com/p/DSxgmWIiRhr/?utm_source=ig_web_copy_link" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                    <p class="mt-2">
                        <a href="https://www.instagram.com/p/DSxgmWIiRhr/?utm_source=ig_web_copy_link">
                            @musiksmeskarofficial
                        </a>
                    </p>
                </x-content-card>

            </div>
        </div>

        <!-- KANAN -->
        <div class="col-md-4">
            <div class="card profile-card shadow p-4">

                @php
                $kanan = [
                    [
                        'title' => 'Visi',
                        'content' => '<p class="text-center">
                            Menjadikan ekskul musik sebagai ruang kreatif, solid, dan menyenangkan.
                        </p>'
                    ],
                    [
                        'title' => 'Misi',
                        'content' => '<ul>
                            <li>Mengembangkan bakat musik anggota</li>
                            <li>Membangun kekompakan</li>
                            <li>Tampil di acara sekolah</li>
                        </ul>'
                    ],
                    [
                        'title' => 'Pengurus Harian',
                        'content' => '<ul>
                            <li>Ketua: Annisa Nisfi Ramadani</li>
                            <li>Wakil: Novtriza Aquila Asha</li>
                            <li>Sekretaris 1: Melisa Ayu Setio Wati</li>
                            <li>Sekretaris 2: Faizah Azzahra</li>
                            <li>Bendahara 1: Qisa Nahla Billah</li>
                            <li>Bendahara 2: Kayla Salfana</li>
                        </ul>'
                    ],
                    [
                        'title' => 'Jadwal Latihan',
                        'content' => '<p class="text-center">
                            Setiap <b>hari Selasa</b> setelah jam pelajaran
                        </p>'
                    ],
                    [
                        'title' => 'Manfaat',
                        'content' => '<ul>
                            <li>Mengembangkan bakat</li>
                            <li>Melatih percaya diri</li>
                            <li>Menambah pengalaman tampil</li>
                            <li>Memperluas pertemanan</li>
                        </ul>'
                    ]
                ];
                @endphp

                @foreach ($kanan as $item)
                <x-content-card :title="$item['title']" class="mb-3">
                    {!! $item['content'] !!}
                </x-content-card>
                @endforeach

            </div>
        </div>

    </div>
</section>

@endsection
