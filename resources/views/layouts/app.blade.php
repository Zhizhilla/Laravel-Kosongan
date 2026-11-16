<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | ZHIZHILLA</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            background-color: #0b0914;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            overflow-x: hidden;
        }

        /* Video Background Fullscreen */
        .video-bg {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            object-fit: cover;
            z-index: -2;
        }

        /* Overlay gelap tipis (muncul barengan kotak kaca setelah 3 detik) */
        .video-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background: radial-gradient(circle, rgba(20, 15, 40, 0.35) 0%, rgba(10, 8, 22, 0.78) 100%);
            z-index: -1;
        }
        .overlay-delay {
            opacity: 0;
            animation: munculOverlay 1s ease forwards;
            animation-delay: 3s;
        }
        @keyframes munculOverlay {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        /* Animasi Muncul Kotak Kaca */
        @keyframes munculGlass {
            from { opacity: 0; transform: translateY(20px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* Kotak Kaca Utama */
        .glass-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 82vh;
            background: rgba(25, 22, 48, 0.48);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 26px;
            padding: 35px 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        /* Jeda 3 detik khusus di halaman Welcome */
        .delay-3s {
            opacity: 0;
            animation: munculGlass 1s ease forwards;
            animation-delay: 3s;
        }

        /* Header */
        header { display: flex; justify-content: space-between; align-items: center; }
        .brand { color: #d8b4fe; font-weight: 800; letter-spacing: 3px; text-decoration: none; font-size: 1.1rem; text-transform: uppercase; }
        nav a {
            color: #cbd5e1;
            text-decoration: none;
            margin-left: 28px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding-bottom: 6px;
            transition: 0.25s;
        }
        nav a:hover, nav a.active {
            color: #ffffff;
            border-bottom: 2px solid #c084fc;
        }

        /* Area Konten */
        main { margin: 40px 0; }
        .pill-badge {
            display: inline-block;
            background: rgba(192, 132, 252, 0.18);
            border: 1px solid rgba(192, 132, 252, 0.35);
            color: #e9d5ff;
            padding: 6px 18px;
            border-radius: 999px;
            font-size: 0.78rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }
        .btn-glass {
            display: inline-block;
            margin-top: 28px;
            padding: 14px 32px;
            border-radius: 999px;
            background: rgba(216, 180, 254, 0.2);
            border: 1px solid rgba(216, 180, 254, 0.5);
            color: #ffffff;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: 0.3s;
        }
        .btn-glass:hover {
            background: rgba(216, 180, 254, 0.38);
            transform: translateY(-2px);
        }

        /* Card & Grid */
        .grid-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px; margin-top: 20px; }
        .sub-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding: 18px;
        }
        .sub-card img { width: 100%; height: 150px; object-fit: cover; border-radius: 10px; margin-bottom: 12px; }

        /* Footer */
        footer { text-align: center; font-size: 0.75rem; color: rgba(255, 255, 255, 0.4); letter-spacing: 1.5px; text-transform: uppercase; }
    </style>
</head>
<body>

    {{-- Video Background Edinburgh --}}
    <video id="bgVideo" class="video-bg" autoplay muted loop playsinline>
        <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
    </video>
    <div class="video-overlay {{ request()->routeIs('welcome') ? 'overlay-delay' : '' }}"></div>

    {{-- Kotak Kaca Utama --}}
    <div class="glass-wrapper {{ request()->routeIs('welcome') ? 'delay-3s' : '' }}">
        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script>
        const glassBox = document.querySelector('.glass-wrapper');
        const overlayBox = document.querySelector('.video-overlay');

        // Ganti halaman tanpa me-reload <video> di background
        async function pindahHalaman(url, pushHistory = true) {
            try {
                const response = await fetch(url);
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                // Ambil isi baru dari .glass-wrapper dan <title>
                const newGlass = doc.querySelector('.glass-wrapper');
                if (newGlass && glassBox) {
                    glassBox.classList.remove('delay-3s');
                    if (overlayBox) overlayBox.classList.remove('overlay-delay');
                    glassBox.innerHTML = newGlass.innerHTML;
                    document.title = doc.title;
                }

                if (pushHistory) {
                    history.pushState(null, '', url);
                }
            } catch (err) {
                window.location.href = url;
            }
        }

        // Tangkap semua klik link internal di dalam kotak kaca
        document.addEventListener('click', (e) => {
            const link = e.target.closest('a');
            if (!link) return;

            const href = link.getAttribute('href');
            if (href && href.startsWith(window.location.origin)) {
                e.preventDefault();
                pindahHalaman(href);
            }
        });

        // Support tombol Back/Forward di browser
        window.addEventListener('popstate', () => {
            pindahHalaman(window.location.href, false);
        });
    </script>

</body>
</html>