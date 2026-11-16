@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <h2 style="margin-bottom: 5px;">Galeri & Sosial Media</h2>
    <p style="color: #cbd5e1; margin-bottom: 25px;">Kumpulan foto, akun sosial media, dan video milik Illa.</p>

    {{-- KATEGORI 1: FOTOKU (LOOPING 1) --}}
    <h3 style="margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 8px;">📸 Fotoku</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 35px;">
        @foreach ($fotoku as $item)
            <div class="sub-card" style="padding: 12px; text-align: center;">
                <img src="{{ $item['foto'] }}" alt="{{ $item['judul'] }}" style="width: 100%; height: 240px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
                <h4 style="margin: 0 0 4px 0;">{{ $item['judul'] }}</h4>
                <small style="color: #94a3b8;">{{ $item['caption'] }}</small>
            </div>
        @endforeach
    </div>

    {{-- KATEGORI 2: SOSIAL MEDIAKU (LOOPING 2) --}}
    <h3 style="margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 8px;">📱 Sosial Mediaku</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 35px;">
        @foreach ($sosmed as $akun)
            <div class="sub-card" style="padding: 12px; text-align: center;">
                <img src="{{ $akun['foto'] }}" alt="{{ $akun['platform'] }}" style="width: 100%; height: 280px; object-fit: cover; object-position: top; border-radius: 10px; margin-bottom: 10px;">
                <span style="font-size: 0.75rem; background: rgba(56, 189, 248, 0.2); color: #38bdf8; padding: 3px 10px; border-radius: 20px;">
                    {{ $akun['platform'] }}
                </span>
                <h4 style="margin: 8px 0 4px 0;">{{ $akun['username'] }}</h4>
                <p style="font-size: 0.85rem; color: #cbd5e1; margin: 0 0 10px 0;">{{ $akun['stats'] }}</p>
                <a href="{{ $akun['link'] }}" target="_blank" style="display: inline-block; padding: 6px 14px; background: #38bdf8; color: #0f172a; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.85rem;">
                    Kunjungi Profil
                </a>
            </div>
        @endforeach
    </div>

    {{-- KATEGORI 3: VIDEO-VIDEOKU (LOOPING 3) --}}
    <h3 style="margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 8px;">🎬 Video-videoku</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 15px;">
        @foreach ($videoku as $vid)
            <div class="sub-card" style="padding: 12px;">
                <video controls style="width: 100%; border-radius: 10px; margin-bottom: 10px;">
                    <source src="{{ $vid['file'] }}" type="video/mp4">
                </video>
                <h4 style="margin: 0 0 4px 0;">{{ $vid['judul'] }}</h4>
                <small style="color: #94a3b8;">{{ $vid['keterangan'] }}</small>
            </div>
        @endforeach
    </div>
@endsection