# Admin Account
    Username admin : admin@gmail.com
    Password admin : admin

# Approval Account
    Username approval 1 : approval@gmail.com
    Password approval 1 : 1234567890
    
    Username approval 2 : approval2@gmail.com
    Password approval 2 : 1234567890

# Database Version
    Server version: 10.4.24-MariaDB - mariadb.org binary distribution

# PHP Version
    PHP version: 8.1.6

# Framework
    Laravel Framework 9.52.0

# Panduan penggunaan aplikasi
    1. Login dengan akun yang telah disediakan --> Admin = mengatur segala crud || Approval = user yang menyetujui pengajuan pemesanan
    2. Setelah masuk akan ada beberapa pilihan menu yang dapat diakses oleh user --> default menu saat pertama kali login adalah dashboard
    3. Admin bertindak untuk menginputkan pemesanan kendaraan dan menentukan driver
    4. Terdapat log history yang akan secara otomatis bertambah ketika ada perubahan status laporan
    5. terdapat log aktivitas yang berisi aktivitas user ketika login dan logout
    6. Terdapat fitur export laporan periodik yang menampilkan jumlah aktivitas perhari ( Aktivitas akan berkurang ketika admin melakukan delete kedalam log history )

> **Note**
Kedua approval harus menyetujui sebuah pemesanan agar status menjadi "Disetujui"
