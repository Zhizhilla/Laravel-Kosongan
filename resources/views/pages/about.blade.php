@extends('layouts.app')

@section('title', 'Deskripsi Diri')

@section('content')
    <div class="sub-card" style="margin-bottom: 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <h2>Tentang <span style="color: #d8b4fe;">{{ $nama }}</span></h2>
            @if ($statusAktif)
                <span class="pill-badge" style="margin-bottom: 0;">● Mahasiswi Aktif</span>
            @else
                <span class="pill-badge" style="margin-bottom: 0;">Alumni</span>
            @endif
        </div>
        <p style="color: #e2e8f0; line-height: 1.7;">{{ $bio }}</p>
    </div>

    <h3 style="letter-spacing: 1px;">Tentang Keseharian & Hobi</h3>
    <div class="grid-cards">
        @foreach ($skills as $skill)
            <div class="sub-card">
                <small style="color: #d8b4fe; font-weight: bold;">#{{ $loop->iteration }}</small>
                <h4 style="margin: 8px 0;">{{ $skill['nama'] }}</h4>
                <p style="color: #cbd5e1; font-size: 0.9rem;">Level: {{ $skill['level'] }}</p>
            </div>
        @endforeach
    </div>
@endsection