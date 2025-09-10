# Laporan Modul 1: Perkenalan Laravel
**Mata Kuliah:** Workshop Web Lanjut    
**Nama:** Muhammad Fathurrahman     
**NIM:** 2024573010004  
**Kelas:** TI 2C

---

## Abstrak 
Laporan ini berisi tentang penjelasan tentang framework laravel. Disini juga kita akan mempelajari cara membuat project laravel dan menambahkan project laravel ke dalam repository github. Tujuan membuat laporan ini adalah untuk mengulang materi tentang laravel

---

## 1. Pendahuluan
- Tuliskan teori perkenalan tentang laravel
Laravel adalah framework web PHP open source, yg bertujuan untuk mempermudah dan mempercepat pengembangan web dengan menerapkan pola arsitektur Model View Controller. Laravel dibuat oleh Taylor Otwell pada tahun 2011
- Apa itu Laravel?
Laravel adalah sebuah framework yang dibuat dengan bahasa pemrograman PHP. 
- Karakteristik utama (MVC, opinionated, dsb.)
MVC adalah pola arsitektur yang memisahkan aplikasi menjadi tiga komponen utama yaitu:
1. Model (data dan logika bisnis) 
2. View (antarmuka pengguna) 
3. dan Controller (menghubungkan keduanya dan menangani input pengguna). Tujuannya adalah untuk mempermudah pengelolaan, pengujian, dan pemeliharaan kode dengan mencapai pemisahan perhatian (separation of concerns). 
Opinionated framework artinya Laravel sudah membawa seperangkat konvensi dan best practices yang menjadi panduan dalam membangun aplikasi.
- Untuk jenis aplikasi apa Laravel cocok?
Laravel cocok untuk pembuatan aplikasi web modern contohnya seperti situs web media sosial 

--- 

## 2. Komponen Utama Laravel (ringkas)
Tuliskan penjelasan singkat (1–3 kalimat) untuk tiap komponen berikut:
- Blade (templating)
Blade adalah template engine bawaan Laravel yang memungkinkan pengembang membuat antarmuka pengguna dengan sintaks yang sederhana dan dinamis.
- Eloquent (ORM)
Eloquent adalah sistem ORM (Object-Relational Mapping) yang kuat dan mudah digunakan. Dengan fitur ini, pengembang dapat bekerja dengan database menggunakan model tanpa perlu menulis query SQL yang kompleks.
- Routing
Laravel menyediakan sistem routing yang intuitif, memungkinkan pengembang untuk mengelola URL dan kontrol alur aplikasi dengan mudah.
- Model (M)
Model bertanggung jawab untuk mengelola data dan logika bisnis. Laravel menggunakan Eloquent ORM untuk mempermudah manipulasi data di database.
- View (V)
View berfokus pada tampilan antarmuka pengguna. Laravel menggunakan Blade untuk menyusun tampilan yang dinamis dan interaktif.
- Controllers (C)
Controller mengatur alur logika aplikasi, menghubungkan model dan view agar aplikasi berfungsi sesuai dengan kebutuhan.
- Migrations & Seeders
Migration adalah fitur dalam Laravel yang digunakan untuk mengelola skema database. Seeder adalah fitur dalam Laravel yang digunakan untuk mengisi database dengan data awal.
- Artisan CLI
Artisan adalah command-line interface (CLI) Laravel yang membantu pengembang dalam tugas-tugas rutin seperti migrasi database, pembuatan model, dan lain-lain.
- Testing (PHPUnit)
Laravel dilengkapi dengan fitur pengujian bawaan untuk memastikan aplikasi berjalan dengan baik tanpa bug atau masalah.

---

## 3. Berikan penjelasan untuk setiap folder dan files yang ada didalam struktur sebuah project laravel.
### Folder app/
Tempat logika utama aplikasi pada Laravel disimpan. Semua kode inti, seperti controller, model, dan service, ada di sini.

### Folder bootstrap/
Folder ini berfungsi untuk menyiapkan dan menjalankan Laravel sebelum aplikasi dijalankan. Di dalamnya ada file penting dan folder cache.

### Folder config/
Folder ini adalah pusat pengaturan Laravel. Kamu bisa mengatur cara aplikasi berjalan, mulai dari database, autentikasi, cache, sampai email ada di sini.

### Folder database/
Folder ini digunakan untuk mengelola struktur database, data contoh, dan testing data di Laravel.

### Folder public/
Folder ini berisi semua file yang bisa diakses langsung oleh user melalui browser, berfungsi sebagai jembatan antara user dan aplikasi

### Folder resource/
Folder ini digunakan untuk menyimpan file sumber daya (assets) dan template tampilan (view) sebelum dikompilasi atau digunakan. Semua file di sini biasanya diproses sebelum dipindahkan ke folder public.

### Folder routes/
Folder ini berisi file untuk mengatur URL aplikasi dan menentukan apa yang dilakukan Laravel ketika URL tersebut diakses (routing).

### Folder storage/
Folder ini digunakan untuk menyimpan file yang dihasilkan oleh aplikasi Laravel, seperti cache, log, file sementara, dan file yang di-upload.

### Folder tests/
Folder yang berisi semua file testing di Laravel. Folder ini digunakan untuk menulis dan menjalankan tes otomatis agar memastikan fitur aplikasi berjalan sesuai harapan.

### Folder vendor/
Menyimpan semua library dan package pihak ketiga yang di-install melalui Composer.

### Folder & File penting Lainnya
**.env** → Tempat menyimpan konfigurasi environment (misalnya database, mail, API key) yang spesifik untuk server atau lokal.   
**.env.example** → Contoh template dari file .env agar developer lain tahu variabel apa saja yang harus disiapkan.     
**.gitattributes** → Mengatur bagaimana Git menangani file dalam repo (misalnya end-of-line, merge).    
**.gitignore** → Menentukan file/folder yang tidak perlu dimasukkan ke Git (contoh: vendor/, .env).     
**artisan** → File berisi Command-line interface yang menyediakan perintah untuk membantu dalam pengembangan aplikasi Laravel.  
**composer.json** → File konfigurasi Composer.  
**package.json** → File konfigurasi untuk npm/yarn.     
**README.md** → Dokumentasi proyek (biasanya berisi cara instalasi & penggunaan).
**vite.config.js** →Konfigurasi Vite, tool untuk meng-compile dan mengoptimasi asset frontend (CSS, JS).

---

## 4. Diagram MVC dan Cara kerjanya

> Letakkan gambar di dalam folder `laporan1/gambar/`. Kemudian masukkan gambar tersebut ke laporan. 

lihat cara nya disini https://www.ulas.in/komputer/markdown-memasukkan-gambar/

![Diagram MVC][tampilkan_gambar]

[tampilkan_gambar]: gambar\diagram-mvc.png "gambar diagram mvc"

---

## 5. Kelebihan & Kekurangan (refleksi singkat)
- Kelebihan Laravel menurut Anda
Kode lebih rapi dan terstruktur karena menggunakan pola arsitektur MVC (Model View Controller). Laravel mendukung caching, enkripsi data, dan proteksi CSRF (Cross-Site Request Forgery) yg membuatnya menjadi pilihan aman untuk bisnis online.
Contohnya seperti:
    - Toko online
    - Media sosial
    - Dashboard admin

- Hal yang mungkin menjadi tantangan bagi pemula
Terlalu banyak struktur folder mungkin sebagian pemula akan kesulitan memahami nya.

---

## 6. Referensi
Cantumkan sumber yang Anda baca (buku, artikel, dokumentasi) — minimal 2 sumber. Gunakan format sederhana (judul — URL).

- Struktur folder 
https://blog.nawatara.com/penjelasan-struktur-folder-laravel-untuk-pemula-2025/

- Komponen utama laravel
https://bit.telkomuniversity.ac.id/laravel-definisi-fitur-manfaat-cara-kerja-keunggulan-dan-kekurangan/

- Database dan seeder
https://www.barajacoding.or.id/memahami-migration-dan-seeder-dalam-laravel/
---