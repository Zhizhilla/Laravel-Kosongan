Ini urutan command yang wajib kamu ketik di terminal VS Code/Termux urut dari awal sampai bisa jalan:

1. Masuk ke folder project kamu (jika belum):

Bash
cd nama-folder-project

2. Install semua paket/dependency Laravel:

Bash
composer install
(Command ini bakal men-download ulang folder vendor/ yang hilang).

3. Copy file konfigurasi (.env):

Bash
cp .env.example .env
(Kalau di Windows Command Prompt / CMD biasa dan cp gagal, pakai copy .env.example .env).

4. Generate kunci aplikasi (Application Key):

Bash
php artisan key:generate
Verification: Terminal bakal nampilin Application key set successfully.

5. Jalankan Database Migration (opsional, jika pakai database):

Bash
php artisan migrate

6. Jalankan server lokalnya!

Bash
php artisan serve
Verification: Terminal bakal nampilin link seperti Server running on [[http://127.0.0.1:8000](http://127.0.0.1:8000)]. Tinggal buka link itu di browser!
