## 🚀 Cara Setup Laravel dengan Cloudinary

Panduan ini menjelaskan cara mengintegrasikan Cloudinary ke dalam proyek Laravel untuk upload gambar maupun PDF.

---

### 🔧 1. Persiapan Awal

-   Pastikan Anda memiliki akun Cloudinary dan sudah login.
-   Pastikan Anda memiliki proyek Laravel yang ingin dihubungkan ke Cloudinary.
-   Jika belum memiliki proyek laravel, silahkan buat terlebih dahulu.

Jalankan perintah berikut:

```
composer create-project --prefer-dist laravel/laravel name-proyek
```

---

### 📦 2. Instalasi Cloudinary Laravel Package

Jalankan perintah berikut:

```
composer require cloudinary-labs/cloudinary-laravel
```

---

### ⚙️ 3. Publish File Konfigurasi

```
php artisan vendor:publish --provider="CloudinaryLabs\\CloudinaryLaravel\\CloudinaryServiceProvider" --tag="cloudinary-laravel-config"
```

File konfigurasi akan muncul di:

```
config/cloudinary.php
```

---

### 🔑 4. Tambahkan Kredensial Cloudinary pada File `.env`

```
CLOUDINARY_CLOUD_NAME="your_cloud_name"
CLOUDINARY_API_KEY="your_api_key"
CLOUDINARY_API_SECRET="your_api_secret"
```

---

### 📝 5. Buat File Blade untuk Form Upload

Contoh lokasi file:

```
resources/views/upload.blade.php
```

Isi form dapat berupa input file untuk image, PDF, atau video.

---

### 🧭 6. Buat Controller untuk Upload

Buat controller dengan Artisan:

```
php artisan make:controller YourNameController
```

Tambahkan fungsi upload pada controller Anda, misalnya:

-   uploadImage()
-   uploadPDF()

Contoh referensi:  
`App/Http/Controllers/CloudinaryController.php`

---

### 🛣️ 7. Konfigurasi Route

Tambahkan route upload ke `routes/web.php`:

```php
Route::post('/upload', [YourNameController::class, 'uploadImage']);
```

Sesuaikan dengan nama function pada controller.

---

### 🌐 8. Akses Halaman Upload

Buka halaman form upload sesuai URL route yang Anda buat.

---

### 🎉 Selesai

Laravel Anda kini terhubung dengan Cloudinary.  
Selamat mencoba dan semoga berhasil! 🚀

---

## 📞 Contact Person

Jika Anda ingin terhubung atau bekerja sama, silakan hubungi saya melalui platform berikut:

-   💼 **LinkedIn**: https://www.linkedin.com/in/kanero-juniar-840a62273
-   🐙 **GitHub**: https://github.com/Kanero-zero
-   📸 **Instagram**: https://instagram.com/kanero95
-   🌐 **Portfolio Website**: https://kanero-zero.github.io/

Jangan ragu untuk menghubungi saya. Saya siap berdiskusi, kolaborasi, atau sekadar berbagi ilmu! 🚀
