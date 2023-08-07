# Address Book - Aplikasi CRUD dengan Yii 2 RESTful API

Selamat datang di aplikasi Address Book! Aplikasi ini memungkinkan Anda mencatat dan mengelola profil kontak menggunakan Yii 2 RESTful API. Berikut adalah panduan lengkap tentang cara menggunakan aplikasi ini:

## Prasyarat

Sebelum memulai, pastikan Anda telah memenuhi prasyarat berikut:
- PHP versi 7.2 atau yang lebih baru
- MySQL atau MariaDB server
- Composer

## Cara Menggunakan Aplikasi

1. **Unduh Aplikasi**
   - Unduh aplikasi ini dari repositori GitHub dengan mengklik tombol "Code" dan pilih "Download ZIP", atau Anda dapat melakukan `git clone` dari terminal dengan perintah:
     ```
     git clone https://github.com/nama_pengguna/alamat_repo.git
     ```

2. **Instalasi Dependencies**
   - Buka terminal atau command prompt, lalu navigasi ke direktori aplikasi yang telah Anda unduh. Jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan menggunakan Composer:
     ```
     composer install
     ```

3. **Konfigurasi Database**
   - Buat database baru dengan nama 'address_book' di MySQL atau MariaDB.
   - Buka file `config/db.php`, dan sesuaikan pengaturan koneksi database dengan informasi yang sesuai.

4. **Migrasi Database**
   - Jalankan migrasi database untuk membuat tabel 'contact_profiles' dengan perintah:
     ```
     ./yii migrate
     ```

5. **Jalankan Server**
   - Jalankan server aplikasi Yii 2 dengan perintah:
     ```
     ./yii serve
     ```
   - Sekarang aplikasi Anda berjalan di `http://localhost:8080`. Buka browser dan akses URL tersebut.

6. **Mengakses CRUD di index.php**
   - Di browser, akses URL `http://localhost:8080/index.php`. Anda akan melihat halaman CRUD yang memungkinkan Anda untuk menambah, melihat, memperbarui, dan menghapus profil kontak.

7. **Mencoba Operasi CRUD**
   - Di halaman index.php, Anda dapat mengisi formulir untuk menambah profil kontak baru dan mengklik tombol "Create" untuk menyimpannya.
   - Anda juga dapat mengklik tombol "Edit" untuk mengedit profil kontak yang sudah ada, kemudian klik tombol "Update" untuk menyimpan perubahan.
   - Untuk menghapus profil kontak, klik tombol "Delete" yang sesuai.

## Lisensi

Aplikasi Address Book didistribusikan di bawah [lisensi MIT](./LICENSE.txt). Lihat file LICENSE untuk informasi selengkapnya.

