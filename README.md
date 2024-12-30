# Website Manajemen Produk

Website ini adalah proyek untuk memanajemen produk, dirancang menggunakan Laravel dan beberapa teknologi pendukung.

## 🎯 Tujuan Proyek

Menyediakan platform untuk memudahkan pengelolaan produk, model, dan ukuran produk.

## ✨ Fitur Utama

- **Login**: Akun admin dan super admin menggunakan Laravel Breeze.  
- **Dashboard**: Tampilan utama untuk manajemen.  
- **Manajemen Produk**: Mengelola produk.  
- **Manajemen Model Produk**: Mengelola data model produk.  
- **Manajemen Ukuran Produk**: Mengelola ukuran produk.  
- **Seeder**: Menyediakan data awal untuk akun admin, super admin, model, dan ukuran produk.

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel dengan Laravel Breeze untuk otentikasi.  
- **Frontend**: Bootstrap dan Sweet Alert.  
- **Database**: MySQL.  

## 🚀 Cara Menjalankan Proyek

1. Clone repositori ini:  
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. Install dependencies:  
   ```bash
   composer install
   npm install
   ```

3. Buat file `.env` dan atur konfigurasi database. Lalu jalankan:  
   ```bash
   php artisan migrate --seed
   ```

4. Jalankan server:  
   ```bash
   npm run dev
   php artisan serve
   ```

5. Akses aplikasi di `http://localhost:8000`.

## 🚧 Status Proyek

Proyek ini siap digunakan dengan fitur-fitur dasar untuk manajemen produk.
