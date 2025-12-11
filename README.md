<p align="center">
    <a href="#" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-10-red" alt="Laravel Version">
    <img src="https://img.shields.io/badge/Filament-3-blue" alt="Filament Version">
    <img src="https://img.shields.io/badge/PHP-8.2-green" alt="PHP Version">
    <img src="https://img.shields.io/badge/Midtrans-Payment%20Gateway-yellow" alt="Midtrans">
    <img src="https://img.shields.io/badge/License-MIT-brightgreen" alt="License">
</p>

<h2 align="center">
Sistem Informasi Pemesanan Otomatis & Pemasangan Jaringan Wifi  
<br>PT ARSENET GLOBAL SOLUTION
</h2>

---

## 📌 Tentang Project

Sistem ini dirancang untuk mempermudah proses **pemesanan paket internet**, **pembayaran otomatis**, dan **manajemen pemasangan jaringan Wifi** pada **PT ARSENET GLOBAL SOLUTION**.  
Dilengkapi dengan **multi role login**, **CMS lengkap menggunakan Filament**, dan **payment gateway Midtrans** untuk memastikan proses pemesanan lebih cepat, terstruktur, dan otomatis.

Aplikasi ini dibangun menggunakan:

- **Laravel 10**
- **Filament 3**
- **Midtrans Payment Gateway (Snap)**
- **MySQL**
- **TailwindCSS & Vite**

---

## 🚀 Fitur Utama

### 🔐 Multi Role Login
- **Admin** — full access (CMS, manajemen user, transaksi, paket, galeri)
- **Petugas** — mengelola pemasangan dan status pesanan
- **User** — melakukan pemesanan paket dan pembayaran online

### 🗂️ CMS Menggunakan Filament
Admin dapat mengatur semua konten pada website utama:
- Detail paket wifi
- Galeri foto
- Halaman konten website (About, FAQ, Banner, Promo)
- Manajemen artikel / slider

### 💳 Payment Gateway Midtrans
- Pembayaran otomatis via Snap UI
- Notifikasi callback automatis
- Update status transaksi (pending, expired, success)
- Riwayat transaksi lengkap di dashboard admin

### 📦 Sistem Pemesanan
- User memilih paket wifi
- Input data pemasangan
- Upload bukti (jika diperlukan)
- Tracking status pemasangan

### 📊 Dashboard Filament
- Grafik transaksi
- Jumlah pemesanan
- Status pemasangan
- Log aktivitas

---

## 🛠️ Instalasi

### 1. Clone Repository
```bash
-git clone https://github.com/Robertpellokila/Arsenet.git
-cd Arsenet
-composer install
-npm install
-cp .env.example .env
-php artisan key:generate
```
```bash

### 2. Set Database .env
-DB_DATABASE=arsenet_db
-DB_USERNAME=root
-DB_PASSWORD=
```
```bash

### 3. Migrasi Database
-php artisan migrate --seed
```
```bash
### 4. Set Midtrans Credentials
-MIDTRANS_SERVER_KEY=your_server_key
-MIDTRANS_CLIENT_KEY=your_client_key
-MIDTRANS_IS_PRODUCTION=false
```
```bash
### 5. Run Development Server
-php artisan serve
-npm run dev
```
```bash