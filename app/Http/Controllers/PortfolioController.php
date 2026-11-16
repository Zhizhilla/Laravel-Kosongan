<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function welcome()
    {
        $nama = "Illa (Zhizhilla)";
        $role = "Informatics Student & Content Creator";
        $tagline = "Membangun aplikasi web modern dan karya animasi digital.";

        return view('pages.welcome', compact('nama', 'role', 'tagline'));
    }

    public function about()
    {
        $nama = "Illa";
        $statusAktif = true; // Syarat If-Else tetap aman
        $bio = "Mahasiswi Informatika di INSTIKI Bali yang lagi bertahan hidup di tengah gempuran praktikum, tugas ngoding, dan kuis mendadak.";

        // Hobi & Kebiasaan Sehari-hari (Syarat Looping Page 2)
        $skills = [
            ['nama' => 'Nonton Drama & Animasi', 'level' => 'Hobi Utama'],
            ['nama' => 'Rebahan & Scroll Santai', 'level' => 'Mode Hemat Energi'],
            ['nama' => 'Eksperimen Desain & Editing', 'level' => 'Mood-moodan'],
            ['nama' => 'Ngoding Kepepet Deadline', 'level' => 'Skill Wajib Mahasiswa'],
        ];

        return view('pages.about', compact('nama', 'statusAktif', 'bio', 'skills'));
    }

   public function gallery()
    {
        // Kategori 1: Fotoku (3 Foto)
        $fotoku = [
            [
                'judul' => 'Retro Camcorder Vibes',
                'caption' => 'Pose peace ala kamera jadul',
                'foto' => asset('images/foto1.jpg')
            ],
            [
                'judul' => 'White Lily Grid',
                'caption' => 'Kolase foto estetik',
                'foto' => asset('images/foto2.jpg')
            ],
            [
                'judul' => 'Mirror Selfie',
                'caption' => 'Abadikan momen santai',
                'foto' => asset('images/foto3.jpg')
            ],
        ];

        // Kategori 2: Sosial Mediaku (3 Screenshot + Link)
        $sosmed = [
            [
                'platform' => 'TikTok',
                'username' => '@zhizhilla26',
                'stats' => '7.651 Pengikut • 124,1 rb Suka',
                'foto' => asset('images/sosmed-tiktok.jpg'),
                'link' => 'https://tiktok.com/@zhizhilla26'
            ],
            [
                'platform' => 'Instagram',
                'username' => '@zhiz.hil',
                'stats' => 'Zhilla • Personal & Daily',
                'foto' => asset('images/sosmed-ig.jpg'),
                'link' => 'https://instagram.com/zhiz.hil'
            ],
            [
                'platform' => 'YouTube',
                'username' => '@Zhizhilla',
                'stats' => '57,5 rb Subscriber • 89 Video',
                'foto' => asset('images/sosmed-yt.jpg'),
                'link' => 'https://youtube.com/@Zhizhilla'
            ],
        ];

        // Kategori 3: Video-videoku (Pakai file video yang sudah ada)
        $videoku = [
            [
                'judul' => 'Edinburgh Aesthetic Background',
                'keterangan' => 'Video latar utama website portofolio',
                'file' => asset('videos/bg.mp4')
            ],
        ];

        return view('pages.gallery', compact('fotoku', 'sosmed', 'videoku'));
    }
}