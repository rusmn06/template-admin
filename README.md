<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  
  <h1 align="center" style="font-size: 2.5rem; margin-top: 0.5rem;">Laravel Admin Template</h1>
  
  <p align="center">
    <strong>Admin panel starter kit berbasis Laravel 12 + SB Admin 2</strong>
    <br>
    Build cepat untuk sistem admin, dashboard, atau back-office aplikasi web.
  </p>

  <!-- Badges -->
  <p>
    <img src="https://img.shields.io/badge/Laravel-12.x-F9322C?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
    <img src="https://img.shields.io/badge/SB_Admin_2-✓-4e73df?style=for-the-badge&logo=bootstrap&logoColor=white" alt="SB Admin 2">
    <img src="https://img.shields.io/badge/Chart.js-✓-FF6384?style=for-the-badge&logo=chartdotjs&logoColor=white" alt="Chart.js">
    <br>
    <img src="https://img.shields.io/github/license/laravel/laravel?style=flat-square&color=blue" alt="MIT License">
    <img src="https://img.shields.io/badge/MySQL|PostgreSQL|SQLite-supported-47A248?style=flat-square" alt="DB Support">
    <img src="https://img.shields.io/badge/role--based_access-✓-success?style=flat-square" alt="Role-based access">
    <img src="https://img.shields.io/badge/password--reset-✓-informational?style=flat-square" alt="Password Reset">
  </p>
</div>

---

## 📋 Table of Contents

- [✨ Features](#-features)
- [📦 Requirements](#-requirements)
- [🚀 Quick Start](#-quick-start)
- [🔐 Default Admin Account](#-default-admin-account)
- [📁 Project Structure](#-project-structure)
- [🧩 Tech Stack](#-tech-stack)
- [🛠️ Built-in Commands](#️-built-in-commands)
- [👥 User Roles](#-user-roles)
- [🌐 Routes Overview](#-routes-overview)
- [🧪 Testing](#-testing)
- [📄 License](#-license)

---

## ✨ Features

| Feature | Status |
|---------|--------|
| 🔐 **Login & Register** | ✅ Built-in |
| 🔑 **Password Reset** (via email) | ✅ Built-in |
| 👤 **Role-based Access** (Admin / User) | ✅ Built-in |
| 🛡️ **Admin Middleware** (`auth`, `admin`) | ✅ Configured |
| 📊 **Admin Dashboard** with stats cards | ✅ SB Admin 2 |
| 🔍 **Topbar Search** | ✅ Included |
| 🔔 **Notifications & Alerts UI** | ✅ Included |
| 📈 **Charts** (Chart.js) | ✅ Included |
| 👥 **User Management** (seeders) | ✅ Ready |
| 💾 **Database Agnostic** (SQLite / MySQL / PostgreSQL) | ✅ Supported |
| 🎨 **Custom Fonts** (Davigo Pro + San Francisco Mono) | ✅ Loaded |

---

## 📦 Requirements

| Dependency | Version |
|------------|---------|
| PHP | ^8.2 |
| Composer | ^2.x |
| Database | SQLite / MySQL 8+ / PostgreSQL 14+ |

> Node.js / npm is **not required** — this template uses pre-built assets (SB Admin 2).

---

## 🚀 Quick Start

### 1️⃣ Clone & Install

```bash
git clone <repo-url> my-admin
cd my-admin
composer install
```

### 2️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` to match your database. Default uses SQLite (zero config):

```env
DB_CONNECTION=sqlite
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=my_database
# DB_USERNAME=root
# DB_PASSWORD=
```

### 3️⃣ Migrate & Seed

```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
```

### 4️⃣ Run the Server

```bash
php artisan serve
```

Akses aplikasi di **http://localhost:8000**

> Untuk development full-stack (server + queue + logs) jalankan `composer run dev`.

---

## 🔐 Default Admin Account

Setelah menjalankan seeder, akun admin default:

| Field | Value |
|-------|-------|
| **Email** | `admin@gmail.com` |
| **Password** | `password` |
| **Role** | `admin` |

---

## 📁 Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php    # Auth logic (login, register, reset)
│   │   │   └── Controller.php        # Base controller
│   │   └── Middleware/
│   │       └── IsAdmin.php           # Admin role middleware
│   └── Models/
│       └── User.php                  # User model with role enum
├── bootstrap/
│   └── app.php                       # Middleware registration
├── config/                           # App configuration
├── database/
│   ├── migrations/                   # Users, cache, jobs tables
│   └── seeders/
│       ├── AdminUserSeeder.php       # Default admin seed
│       └── DatabaseSeeder.php
├── public/
│   ├── assets/sb-admin-2/            # Pre-built SB Admin 2 assets
│   ├── css/custom.css                # Custom fonts & theme overrides
│   └── fonts/                        # Davigo Pro & SF Mono fonts
├── resources/views/
│   ├── admin/dashboard.blade.php     # Admin dashboard
│   ├── user/dashboard.blade.php      # User dashboard
│   ├── auth/                         # Login, register, password views
│   ├── layouts/                      # App layout (SB Admin 2 shell)
│   └── partials/                     # Sidebar, topbar, footer
└── routes/
    └── web.php                       # All route definitions
```

---

## 🧩 Tech Stack

| Technology | Purpose |
|------------|---------|
| [Laravel 12](https://laravel.com) | PHP Framework |
| [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2) | Admin UI Theme (Bootstrap 4) |
| [Chart.js](https://www.chartjs.org) | Dashboard Charts |
| [Font Awesome](https://fontawesome.com) | Icons |
| Davigo Pro + San Francisco Mono | Custom Fonts |
| SQLite / MySQL / PostgreSQL | Database |

---

## 🛠️ Built-in Commands

```bash
# Run full dev stack (server + queue + logs)
composer run dev

# Run tests
php artisan test

# Seed admin user
php artisan db:seed --class=AdminUserSeeder

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 👥 User Roles

This template implements a simple role-based access system using an `enum` column on the `users` table:

- **`admin`** — Full access to `/admin/dashboard` and admin features
- **`user`** — Limited access to user dashboard only

The `IsAdmin` middleware protects all admin routes, returning a `403` for unauthorized users.

---

## 🌐 Routes Overview

| Method | URI | Name | Middleware |
|--------|-----|------|------------|
| GET | `/` | — | Redirects based on auth |
| GET | `/login` | `login` | `guest` |
| POST | `/login` | — | `guest` |
| GET | `/register` | `register` | `guest` |
| POST | `/register` | — | `guest` |
| GET | `/forgot-password` | `password.request` | `guest` |
| POST | `/forgot-password` | `password.email` | `guest` |
| GET | `/reset-password/{token}` | `password.reset` | `guest` |
| POST | `/reset-password` | `password.update` | `guest` |
| POST | `/logout` | `logout` | `auth` |
| GET | `/dashboard` | `dashboard` | `auth` |
| GET | `/admin/dashboard` | `admin.dashboard` | `auth`, `admin` |

---

## 🧪 Testing

```bash
php artisan test
```

Tests are located in `tests/` directory using PHPUnit.

---

## 📄 License

Distributed under the [MIT License](LICENSE).

---

<div align="center">
  <sub>Built with ❤️ using <a href="https://laravel.com">Laravel</a> + <a href="https://startbootstrap.com/theme/sb-admin-2">SB Admin 2</a></sub>
  <br>
  <sub>© 2026 — Template Admin</sub>
</div>
