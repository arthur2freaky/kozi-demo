# KOZI Coffee Bekasi — Website

Website resmi KOZI Coffee Bekasi. Dibuat dengan **PHP + MySQL (PDO) + HTML5 + CSS3 + JavaScript**, tema warna merah–krem mengikuti identitas logo KOZI.

## Isi Folder

```
kozi-coffee-website/
├── index.php              -> Halaman utama (hero, about, menu favorit, galeri, testimoni, lokasi)
├── menu.php                -> Menu lengkap (70+ item) dari database, dengan search & filter
├── contact.php              -> Halaman kontak + form pesan
├── send_message.php         -> Handler AJAX untuk menyimpan form kontak ke database
├── config/
│   ├── db.php                -> Koneksi database (PDO) — EDIT SESUAI SETUP KAMU
│   └── settings.php          -> Info toko: alamat, no. telp, jam buka, rating, dll
├── includes/
│   ├── header.php            -> Navbar (dipakai semua halaman)
│   └── footer.php            -> Footer (dipakai semua halaman)
├── css/style.css             -> Semua styling
├── js/main.js                -> Semua interaksi (nav mobile, search menu, lightbox, dll)
├── images/                   -> Foto makanan/minuman (diambil dari menu PDF KOZI) + logo
└── database/kozi_db.sql      -> Struktur tabel + seed data menu (import ini duluan)
```

## Cara Menjalankan (XAMPP / Laragon)

1. **Copy folder** `kozi-coffee-website` ke dalam `htdocs` (XAMPP) atau `www` (Laragon).
2. **Buat database:**
   - Buka phpMyAdmin (`http://localhost/phpmyadmin`)
   - Klik tab **Import**, pilih file `database/kozi_db.sql`, lalu klik **Go**.
   - Database `kozi_db` beserta 12 kategori dan 71 menu akan otomatis terbuat.
3. **Cek koneksi database** di `config/db.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'kozi_db');
   define('DB_USER', 'root');
   define('DB_PASS', '');   // sesuaikan kalau MySQL kamu pakai password
   ```
4. **Jalankan** Apache & MySQL dari XAMPP Control Panel.
5. Buka di browser: `http://localhost/kozi-coffee-website/index.php`

## Edit Info Toko

Semua info seperti alamat, no. telepon, jam buka, rating Google, dan link Instagram ada di satu file:
`config/settings.php` — tinggal ubah nilainya, otomatis update di semua halaman.

## Edit / Tambah Menu

Menu diambil dari 2 tabel di database:
- `categories` — daftar kategori (Rice Bowl, Ramen, Pasta, dst)
- `menu_items` — daftar item menu, terhubung ke `categories` lewat `category_id`

Untuk menambah menu baru, tinggal `INSERT` ke tabel `menu_items` lewat phpMyAdmin, atau jalankan query seperti di `database/kozi_db.sql`. Tidak perlu edit kode PHP sama sekali — halaman menu otomatis menampilkan data terbaru dari database.

## Form Kontak

Pesan dari form di halaman **Contact** otomatis tersimpan ke tabel `messages` di database (bisa dilihat lewat phpMyAdmin). Kalau mau pesan juga dikirim ke email, tinggal tambahkan fungsi `mail()` PHP di `send_message.php`.

## Tentang Gambar

Foto makanan & minuman di website ini diambil langsung dari file menu PDF KOZI yang kamu kirim (bukan hasil generate AI), supaya hasilnya tetap foto asli produk KOZI. Kalau nanti mau tambah foto suasana cafe / barista / event, tinggal upload file ke folder `images/` dan panggil di halaman yang diinginkan (`index.php`, section Gallery).

## Catatan

- Semua harga di database dalam satuan Rupiah penuh (misal `30000` = Rp 30.000), otomatis diformat di tampilan.
- Warna merah utama: `#e31c0e` (diambil langsung dari logo KOZI).
- Font: Poppins (judul/heading) + Inter (teks), dari Google Fonts — butuh koneksi internet saat website dibuka.
- Sudah responsive untuk mobile, tablet, dan desktop.
