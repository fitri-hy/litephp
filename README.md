Proyek ini adalah framework aplikasi web sederhana yang dibangun dengan menggunakan PHP. Struktur proyek ini dirancang untuk mendukung pengembangan aplikasi web yang terstruktur dan dapat dikembangkan lebih lanjut. Framework ini mengikuti pola arsitektur MVC (Model-View-Controller), yang memisahkan logika aplikasi, tampilan, dan data untuk memudahkan pengelolaan dan pengembangan.

Run
```
php -S localhost:8000 -t public
```

Follow
```
http://localhost:8000/
```

```
LitePHP/
├── app/                            # Logika aplikasi (Controller, Model, View)
│   ├── Controllers/                # Mengelola permintaan HTTP dan logika aplikasi
│   │   ├── ApiController.php       # Mengelola permintaan API
│   │   ├── HomeController.php      # Mengelola halaman utama
│   │   └── AboutController.php     # Mengelola halaman "Tentang"
│   ├── Models/                     # Menyimpan logika dan data aplikasi (misal: interaksi DB)
│   └── Views/                      # Tampilan halaman web
│       ├── layouts/                # Template layout dasar
│       │   └── layout.php          # Base layout halaman (header, footer, dll)
│       ├── partials/               # Bagian tampilan yang dapat digunakan kembali
│       │   ├── footer.php          # Tampilan footer
│       │   └── header.php          # Tampilan header
│       ├── 404.php                 # Halaman error 404
│       ├── about.php               # Halaman "Tentang"
│       └── home.php                # Halaman utama
├── public/                         # Aset publik yang diakses oleh pengguna
│   ├── assets/                     # Berisi file CSS, JS, dan gambar
│   │   ├── css/                    # CSS untuk styling
│   │   ├── images/                 # Gambar (logo, ikon, dll)
│   │   └── js/                     # JavaScript untuk interaktivitas
│   └── index.php                   # Titik masuk utama aplikasi
├── routes/                         # Menyimpan file rute aplikasi (API dan web)
│   ├── api.php                     # Rute untuk API
│   └── web.php                     # Rute untuk halaman web
├── config/                         # Pengaturan aplikasi
│   ├── app.php                     # Konfigurasi aplikasi umum
│   └── config.php                  # Konfigurasi tambahan (misal: database, pengaturan lainnya)
├── core/                           # Kode inti framework (Router, Controller, View)
│   ├── Router.php                  # Mengelola rute dan distribusi permintaan
│   ├── Controller.php              # Kelas dasar untuk controller
│   ├── View.php                    # Mengelola rendering tampilan
│   └── Framework.php               # Menangani inisialisasi aplikasi
├── vendor/                         # Dependensi eksternal yang dikelola oleh Composer
├── composer.json                   # File konfigurasi Composer untuk manajemen dependensi
└── README.md                       # Dokumentasi proyek
```
