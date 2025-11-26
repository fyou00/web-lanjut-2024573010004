# Laporan Modul 8: Authentication & Authorization

**Mata Kuliah:** Workshop Web Lanjut  
**Nama:** Muhammad Fathurrahman  
**NIM:** 2024573010004
**Kelas:** TI-2C

---

## Abstrak

Laporan ini membahas penerapan autentikasi dan otorisasi dalam aplikasi Laravel, dimulai dari penggunaan Laravel Breeze untuk membangun fitur pendaftaran, login, pengelolaan profil, serta pembatasan hak akses menggunakan middleware.Kita dapat mempelajari cara membangun sistem login yang aman, membuat rute yang aman dari ancaman hacker, menambahkan role seperti admin, manager, dan user, serta mengelola akses setiap role secara terpisah. Secara keseluruhan, modul ini memberikan dasar lengkap untuk memahami dan menerapkan security access pada aplikasi Laravel.

---

## 1. Dasar Teori

Autentikasi adalah proses verifikasi identikasi user apakah seseorang benar-benar orang yang mereka claim. Contoh saat kita ingin login ke dalam suatu web, maka sistem akan meminta username dan password. Jika cocok dengan data yang tersimpan maka boleh masuk.

Otorisasi adalah proses yang menentukan apakah seseorang boleh melakukan aksi ini atau tidak oleh pengguna yang telah terautentikasi di dalam aplikasi. Contohnya seperti user tidak bisa mengakses halaman admin.

---

## 2. Langkah-Langkah Praktikum

Tuliskan langkah-langkah yang sudah dilakukan, sertakan potongan kode dan screenshot hasil.

2.1 Praktikum 1 – Autentikasi dan Otorisasi pada Laravel 12

-   Buat Proyek Laravel baru bernama `auth-lab`
-   Atur database
    Di file .env harus tampak seperti ini:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=authlab_db
    DB_USERNAME=<username database anda>
    DB_PASSWORD=<password database anda jika ada>
    ```
    dan jalankan `php artisan migrate` untuk membuat database dan table secara otomatis
-   Instalasi Laravel Breeze
    Jalankan perintah berikut untuk download breeze
    `  composer require laravel/breeze --dev`
    Kemudian jalankan untuk menginstall breeze ke dalam project
    `  php artisan breeze:install`
    Install dependency frontend:
    `bash
npm install
npm run dev
`
-   Membuat Rute Profil yang Dilindungi
    Buka web.php:

    ```bash
    <?php

      use App\Http\Controllers\ProfileController;
      use Illuminate\Support\Facades\Route;
      use Illuminate\Support\Facades\Auth;

      Route::get('/', function () {
          return view('welcome');
      });

      Route::get('/dashboard', function () {
          return view('dashboard');
      })->middleware(['auth', 'verified'])->name('dashboard');

      Route::middleware('auth')->group(function () {
          Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
          Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
          Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

          // Tambahkan rute myprofile baru
          Route::get('/myprofile', function () {
              return Auth::user();
          })->name('myprofile');
      });

      require __DIR__.'/auth.php';
    ```

-   Jalankan aplikasi
    ```bash
    php artisan serve
    ```

Screenshot Hasil:

// isi gambar screenshot
// isi gambar screenshot
// isi gambar screenshot

2.2 Praktikum 2 – Membatasi Akses Berdasarkan Peran di Laravel 12

-   Buat Proyek Laravel baru bernama `auth-role`
-   Atur database
    Di file .env harus tampak seperti ini:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=authrole_db
    DB_USERNAME=<username database anda>
    DB_PASSWORD=<password database anda jika ada>
    ```
    dan jalankan `php artisan migrate` untuk membuat database dan table secara otomatis
-   Instalasi Laravel Breeze
    Jalankan perintah berikut untuk download breeze
    `  composer require laravel/breeze --dev`
    Kemudian jalankan untuk menginstall breeze ke dalam project
    `  php artisan breeze:install`
    Install dependency frontend:
    `bash
npm install
npm run dev
`
-   Menambahkan Field Role ke Tabel Users
    Untuk menambahkan field pada suatu table kita perlu menjalankan perintah:

    ```
    php artisan make:migration add_role_to_users_table --table=users
    ```

    Edit file migration:

    ```
    public function up(): void
      {
          Schema::table('users', function (Blueprint $table) {
              $table->string('role')->default('user');
          });
      }

      public function down(): void
      {
          Schema::table('users', function (Blueprint $table) {
              $table->dropColumn('role');
          });
      }
    ```

    Kemudian jalankan `php artisan migrate` untuk update database, dan kini kolom role pasti sudah ada dalam table `users`

-   Seeding User dengan Role Berbeda
    Edit `database/seeders/DatabaseSeeder.php`:

    ```bash
    User::create([
          'name' => 'Admin User',
          'email' => 'admin@ilmudata.id',
          'password' => Hash::make('password123'),
          'role' => 'admin',
      ]);

      User::create([
          'name' => 'Manager User',
          'email' => 'manager@ilmudata.id',
          'password' => Hash::make('password123'),
          'role' => 'manager',
      ]);

      User::create([
          'name' => 'General User',
          'email' => 'user@ilmudata.id',
          'password' => Hash::make('password123'),
          'role' => 'user',
      ]);
    ```

    Kemudian jalankan:

    ```bash
    php artisan db:seed
    ```

-   Membuat Role Middleware
    Generate Middleware:
    `php artisan make:middleware RoleMiddleware`
    Kemudian isi function handle pada `app/Http/Middleware/RoleMiddleware.php`:

    ```bash
    if ($request->user() && $request->user()->role === $role) {
              return $next($request);
          }

          abort(403, 'Unauthorized');
    ```

    Edit `bootstrap\app.php` di dalam withMiddleware():

    ```bash
    $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);
    ```

-   Membuat View untuk Setiap Role
    Di resources/views, buat:

    Kode untuk `resources/views/admin.blade.php`:

    ```bash
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Welcome, Admin! You have full access.") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    ```

    Kode untuk resources/views/manager.blade.php:

    ```bash
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manager Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Welcome, Manager! You can manage and monitor resources.") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    ```

    Kode untuk resources/views/user.blade.php:

    ```bash
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Welcome, User! You have limited access.") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    ```

    Kode untuk resources/views/all.blade.php:

    ```bash
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('General Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Welcome! This view is accessible by all authenticated roles.") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    ```

-   Mendefinisikan Rute untuk View Berbasis Peran
    Buka `routes/web.php` dan tambahkan kode berikut:

    ```bash
    <?php

    use Illuminate\Support\Facades\Route;

    Route::middleware('auth')->group(function () {
        // Rute yang dapat diakses oleh semua pengguna terautentikasi
        Route::get('/all', function () {
            return view('all');
        });

        // Rute khusus admin dengan middleware role
        Route::get('/admin', function () {
            return view('admin');
        })->middleware('role:admin');

        // Rute khusus manager dengan middleware role
        Route::get('/manager', function () {
            return view('manager');
        })->middleware('role:manager');

        // Rute khusus user dengan middleware role
        Route::get('/user', function () {
            return view('user');
        })->middleware('role:user');
    });
    ```

    Penjelasan Rute:

    /all - Dapat diakses oleh semua pengguna yang sudah login
    /admin - Hanya dapat diakses oleh pengguna dengan peran admin
    /manager - Hanya dapat diakses oleh pengguna dengan peran manager
    /user - Hanya dapat diakses oleh pengguna dengan peran user
    <br>
    Middleware yang digunakan:
    auth - Memastikan pengguna sudah login
    role:admin - Memastikan pengguna memiliki peran admin
    role:manager - Memastikan pengguna memiliki peran manager
    role:user - Memastikan pengguna memiliki peran user
    Simpan file untuk menerapkan rute-rute baru ini.
-    Jalankan aplikasi dan Uji
      ```
      php artisan serve
      ```
      Kunjungi http://localhost:8000 dan login menggunakan pengguna yang telah disediakan:    Kemudian, coba akses:
      /admin
      /manager
      /user
      /all

Screenshot Hasil:\
// hasil\
// hasil\
// hasil\
// hasil

---

## 3. Kesimpulan

Melalui modul ini, sistem autentikasi dan otorisasi pada Laravel dapat dipahami dan diterapkan dengan baik mulai dari login, registrasi, manajemen profil, hingga pembatasan hak akses berbasis role. Laravel Breeze mempermudah pembuatan autentikasi dasar, sementara middleware dan role memungkinkan pengaturan akses yang lebih kompleks. Implementasi ini membuktikan bahwa Laravel menyediakan struktur yang kuat dan fleksibel untuk membangun aplikasi web yang aman dan terkontrol.

---

## 4. Referensi

Cantumkan sumber yang Anda baca (buku, artikel, dokumentasi) — minimal 2 sumber. Gunakan format sederhana (judul — URL).

Laravel Blade Templating Engine — https://hackmd.io/@mohdrzu/r1AIUzWpll
Panduan Lengkap Authorization di Laravel 12 — https://qadrlabs.com/post/laravel-gate-panduan-lengkap-authorization-di-laravel-12
Membuat Autentikasi (Multi Role) Web Laravel Anti Ribet dengan Laravel Breeze — https://wahyuivan.medium.com/membuat-autentikasi-multi-role-web-laravel-anti-ribet-dengan-laravel-breeze-269ad99f1197

---
