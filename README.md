# 🛠️ Laravel Admin Template

Template dasar admin panel berbasis **Laravel 12** dengan Tailwind CSS v4 dan Vite. Cocok sebagai titik awal untuk membangun sistem admin, dashboard, atau back-office aplikasi web.

---

## 📋 Persyaratan Sistem

| Kebutuhan | Versi Minimum |
|-----------|---------------|
| PHP | 8.2+ |
| Composer | 2.x |
| Node.js | 18+ |
| npm | 9+ |
| Database | MySQL 8 / PostgreSQL 14 / SQLite |

---

## 🚀 Instalasi

### 1. Clone & Install Dependencies

```bash
git clone <repo-url> nama-project
cd nama-project

composer install
npm install
```

### 2. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env`, sesuaikan koneksi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Migrasi Database

```bash
php artisan migrate
```

### 4. Jalankan Development Server

```bash
# Jalankan semua sekaligus (server + queue + logs + vite)
composer run dev
```

Atau secara terpisah:

```bash
# Terminal 1 - Backend
php artisan serve

# Terminal 2 - Frontend
npm run dev
```

Akses aplikasi di: **http://localhost:8000**

---

## 🏗️ Build untuk Production

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📦 Rekomendasi Package Tambahan

Template ini adalah skeleton kosong. Berikut rekomendasi untuk membangun admin panel yang lengkap:

---

### 🔐 Autentikasi

#### Opsi A — Laravel Jetstream (Direkomendasikan untuk Admin)

Jetstream menyediakan autentikasi lengkap dengan fitur teams, two-factor authentication (2FA), dan manajemen sesi.

```bash
composer require laravel/jetstream

# Pilih stack: Livewire (Blade) atau Inertia (Vue/React)
php artisan jetstream:install livewire --teams

npm install && npm run build
php artisan migrate
```

Fitur yang didapat:
- Login, Register, Logout
- Two-Factor Authentication (2FA)
- Manajemen profil & foto
- Manajemen API token (Sanctum)
- Fitur Teams (multi-tenant)

> **Catatan:** Pilih `--teams` jika aplikasi butuh multi-organisasi. Hapus flag tersebut jika tidak perlu.

#### Opsi B — Laravel Breeze (Ringan & Simpel)

Cocok jika hanya butuh autentikasi dasar tanpa fitur tambahan.

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade

npm install && npm run build
php artisan migrate
```

---

### 🎛️ Admin Panel UI

#### Opsi A — Filament (Direkomendasikan)

Admin panel modern berbasis Livewire, sangat powerful dan mudah dikustomisasi.

```bash
composer require filament/filament:"^3.3" -W
php artisan filament:install --panels
php artisan make:filament-user
```

Akses panel di: **http://localhost:8000/admin**

#### Opsi B — Custom UI dengan Alpine.js

Untuk UI admin custom menggunakan Blade + Tailwind + Alpine.js:

```bash
npm install alpinejs
```

Tambahkan di `resources/js/app.js`:
```js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
```

---

### 📊 Fitur Dashboard

#### Chart & Visualisasi Data

```bash
npm install chart.js
```

#### Tabel Interaktif

```bash
# Jika pakai Filament, sudah termasuk
# Jika custom, gunakan:
npm install datatables.net-dt
```

---

### 🛡️ Keamanan Tambahan

```bash
# Rate limiting & proteksi sudah built-in di Laravel 12

# Untuk audit log aktivitas user:
composer require spatie/laravel-activitylog

# Untuk manajemen roles & permissions:
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

---

### 🐛 Development Tools

```bash
# Debug bar (wajib untuk development)
composer require barryvdh/laravel-debugbar --dev

# IDE helper (autocomplete di PHPStorm/VSCode)
composer require barryvdh/laravel-ide-helper --dev
php artisan ide-helper:generate
```

---

## 📁 Struktur Project

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── web.php
│   └── api.php
└── tests/
```

---

## ⚙️ Stack yang Digunakan

| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| Laravel | 12.x | PHP Framework |
| Tailwind CSS | 4.x | Utility-first CSS |
| Vite | 6.x | Asset bundler |
| Axios | 1.x | HTTP client |

---

## 🔧 Perubahan yang Disarankan di `composer.json`

Ganti `minimum-stability` dari `dev` ke `stable` untuk lingkungan production:

```json
"minimum-stability": "stable"
```

---

## 🧪 Menjalankan Tests

```bash
php artisan test

# Dengan coverage
php artisan test --coverage
```

---

## 📝 Lisensi

[MIT](LICENSE)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
