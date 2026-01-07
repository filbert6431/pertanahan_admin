# Sistem Admin Pertanahan

Sistem manajemen pertanahan berbasis web menggunakan Laravel untuk mengelola data persil, warga, dokumen, peta, dan sengketa pertanahan.

## Fitur Utama

### Dashboard Admin
- **Statistik Real-Time**: Menampilkan jumlah total persil, warga, pengguna, dokumen, peta, dan sengketa.
- **Tabel Recent Data**: Menampilkan 5 data terbaru untuk persil, warga, dan dokumen.
- **Navigasi Mudah**: Link ke halaman detail dan daftar lengkap.

### Manajemen Data
- **Persil**: CRUD untuk data lahan pertanahan, termasuk kode persil, pemilik, luas, penggunaan, alamat, status.
- **Warga**: CRUD untuk data penduduk, termasuk nama, email, password, jenis kelamin, agama, dll.
- **User/Admin**: Manajemen pengguna sistem dengan role-based access.
- **Dokumen Persil**: Upload dan manajemen dokumen terkait persil.
- **Peta Persil**: Integrasi peta untuk visualisasi lahan.
- **Sengketa Persil**: Pelaporan dan manajemen sengketa lahan.

### Keamanan
- **Autentikasi**: Login/logout dengan middleware checkislogin.
- **Otorisasi**: Role-based access (admin) menggunakan middleware checkrole.
- **Validasi Input**: Validasi data di controller dan form.

## Teknologi yang Digunakan

- **Backend**: Laravel 12.37.0, PHP 8.4.12
- **Database**: MySQL (via migrations dan Eloquent ORM)
- **Frontend**: Blade Templates, Bootstrap 5, FontAwesome, Chart.js (untuk visualisasi)
- **Server**: Laragon (untuk development lokal)

## Instalasi dan Setup

### Persyaratan Sistem
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM (untuk assets jika diperlukan)

### Langkah Instalasi
1. **Clone Repository**:
   ```bash
   git clone <repository-url>
   cd pertanahan_admin
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**:
   - Copy `.env.example` ke `.env`
   - Atur database connection di `.env`:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=pertanahan_admin
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate Key**:
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrations dan Seeders**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Storage Link** (untuk file uploads):
   ```bash
   php artisan storage:link
   ```

7. **Jalankan Server**:
   ```bash
   php artisan serve
   ```
   Akses di `http://localhost:8000`

### Struktur Database
- **users**: Tabel pengguna sistem.
- **warga**: Data penduduk.
- **persil**: Data lahan pertanahan.
- **dokumen_persil**: Dokumen terkait persil.
- **peta_persil**: Data peta lahan.
- **sengketa_persil**: Data sengketa.
- **admin**: Tabel admin (jika ada).

### Struktur Folder
```
app/
├── Http/Controllers/          # Controllers (AuthController, PersilController, dll.)
├── Models/                    # Eloquent Models
├── Providers/                 # Service Providers
config/                        # Konfigurasi Laravel
database/
├── migrations/                # Database migrations
├── seeders/                   # Data seeders
public/                        # Assets publik
resources/
├── views/                     # Blade templates
├── css/                       # Custom CSS
routes/
├── web.php                    # Route definitions
```

## Penggunaan

### Login
- Akses `/` atau `/login` untuk halaman login.
- Default admin: email dan password dari seeder.

### Dashboard
- Setelah login, akses `/dashboard` untuk melihat statistik dan data recent.

### CRUD Operations
- Gunakan menu sidebar untuk mengakses modul persil, warga, dll.
- Setiap modul memiliki index, create, edit, show, delete.

## Logika dan Fungsi Utama

### Arsitektur Aplikasi
Sistem ini menggunakan arsitektur MVC (Model-View-Controller) Laravel:
- **Model**: Mewakili data (Persil, Warga, dll.) dan logika bisnis.
- **View**: Template Blade untuk UI (dashboard, form, tabel).
- **Controller**: Menangani request, berinteraksi dengan model, dan mengirim data ke view.

### Logika Dashboard
- **Statistik**: Menggunakan `count()` pada model untuk menghitung total data. Data dikirim ke view sebagai variabel.
- **Tabel Recent**: Query `orderBy('id', 'desc')->take(5)` untuk ambil 5 data terbaru. Relasi (misalnya `with('pemilik')`) digunakan untuk join data terkait.
- **Responsivitas**: Layout menggunakan Bootstrap grid (col-sm-6, col-xl-3) untuk tampilan mobile-friendly.

### Fungsi CRUD
- **Create**: Form input divalidasi, data disimpan via `store()` method di controller.
- **Read**: `index()` untuk list data, `show()` untuk detail.
- **Update**: `edit()` untuk form, `update()` untuk simpan perubahan.
- **Delete**: `destroy()` dengan konfirmasi.

### Autentikasi dan Otorisasi
- **Login**: Cek email/password di `AuthController`, set session.
- **Middleware**: `checkislogin` untuk halaman yang butuh login, `checkrole:admin` untuk akses admin.
- **Logout**: Hapus session dan redirect ke login.

### Upload File
- Menggunakan `MultipleUploadController` untuk handle multi-file upload.
- File disimpan di `storage/app/public`, diakses via symlink `storage:link`.

### Error Handling
- Validasi input di controller (misalnya `request->validate()`).
- Exception handling untuk database errors (misalnya column not found).
- Redirect dengan pesan error/sukses.

### Optimisasi
- Eager loading (`with()`) untuk relasi agar query efisien.
- Pagination di tabel besar menggunakan `paginate()`.
- Cache untuk data statis jika diperlukan.

## API Endpoints (Jika Diperlukan)
- Sistem ini berbasis web, tapi routes dapat diakses via API jika diperlukan.
- Contoh: `GET /api/persil` untuk list persil (perlu autentikasi).

## Testing
- Jalankan unit tests:
  ```bash
  php artisan test
  ```
- Tests ada di `tests/` folder.

## Troubleshooting
- **Error Storage Link**: Pastikan folder `storage/app/public` ada dan jalankan `php artisan storage:link`.
- **Migration Error**: Pastikan database sudah dibuat dan kredensial benar.
- **Permission Issues**: Atur permission folder `storage` dan `bootstrap/cache`.

## Kontribusi
- Fork repository.
- Buat branch untuk fitur baru.
- Commit changes dan push.
- Buat pull request.

## Lisensi
Proyek ini menggunakan lisensi MIT.

## Kontak
Untuk pertanyaan, hubungi [email Anda] atau buat issue di repository.

---

Dokumentasi ini dibuat untuk memudahkan pemahaman dan maintenance proyek. Jika ada perubahan, update README.md ini.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
