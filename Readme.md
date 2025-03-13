# Sistem Manajemen Tugas Berbasis PHP

## Deskripsi
Sistem ini adalah aplikasi berbasis web untuk manajemen tugas yang dibangun menggunakan PHP. Aplikasi ini memungkinkan pengguna untuk mendaftar, masuk, serta membuat, mengedit, dan menghapus tugas.

## Struktur Folder dan Fungsi File
Berikut adalah struktur folder dan fungsi dari masing-masing file dalam sistem:
```
class/
│── koneksi.php              # Mengatur koneksi ke database
│── Task.php                 # Model untuk tugas, menangani operasi CRUD pada tugas
│── User.php                 # Model untuk pengguna, menangani operasi CRUD pada pengguna

index.php                  # Menampilkan semua tugas yang ada dalam sistem
controller_task.php          # Mengelola proses bisnis terkait tugas (menambah, menghapus, mengedit tugas)
controller_user.php          # Mengelola proses bisnis terkait pengguna (registrasi, autentikasi, pembaruan data)
edit_task.php                # Halaman untuk mengedit tugas yang sudah ada
login.php                    # Halaman login untuk pengguna
register.php                 # Halaman registrasi untuk pengguna baru
tambah_task.php              # Halaman untuk menambahkan tugas baru
update_status.php            # Mengubah status tugas (misalnya dari pending ke selesai)
```

## Instalasi dan Konfigurasi
1. **Persyaratan Sistem:**
   - PHP 7.x atau lebih baru
   - MySQL/MariaDB
   - Server Apache/Nginx

2. **Setup Database:**
   - Buat database baru di MySQL.
   - Import skema database yang sesuai dengan kebutuhan sistem.
   - Sesuaikan konfigurasi koneksi di `koneksi.php`.

3. **Menjalankan Aplikasi:**
   - Letakkan folder proyek di dalam root server web (misalnya `htdocs` jika menggunakan XAMPP).
   - Akses melalui browser: `http://localhost/nama_folder/`

## Penggunaan
- **Registrasi:** Pengguna harus mendaftar terlebih dahulu di `register.php`.
- **Login:** Pengguna masuk melalui `login.php`.
- **Manajemen Tugas:** Pengguna dapat menambah tugas (`tambah_task.php`), mengedit tugas (`edit_task.php`), dan mengubah status tugas (`update_status.php`).

## Kontributor
- Nama Anda
- Tim Anda (jika ada)

## Lisensi
Proyek ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).

