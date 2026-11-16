@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div style="text-align: center; padding: 30px 10px;">
        <div class="pill-badge">KUIZ PEMWEB &mdash; PORTFOLIO</div>
        
        <h1 style="font-size: 3.4rem; font-weight: 800; letter-spacing: 2px; margin-bottom: 8px; text-shadow: 0 4px 25px rgba(255,255,255,0.25);">
            {{ strtoupper($nama) }}
        </h1>
        
        <p style="color: #7dd3fc; font-weight: 700; letter-spacing: 2.5px; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 22px;">
            {{ $role }}
        </p>

        <p style="color: #e2e8f0; max-width: 520px; margin: 0 auto; line-height: 1.6; font-size: 0.98rem;">
            {{ $tagline }}
        </p>

        <a href="{{ route('about') }}" class="btn-glass">Kenali Saya Lebih Lanjut &rarr;</a>
    </div>
@endsection