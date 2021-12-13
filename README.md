# Event Kita
## Projek Mata Kuliah Pemograman Web 💻

Event Kita adalah aplikasi berbasis web yang berfungsi sebagai event management. Pada aplikasi ini terdapat 2 buah role user diantaranya : 
1. 👨‍💼**Peserta** merupakan pihak yang dapat mengakses dan mendaftar event yang ingin diikuti.
2. 💂**Penyelenggara** merupakan pihak yang dapat mempublikasikan event miliknya agar bisa diikuti oleh peserta.
3. 🤖**admin** merupakan pihak dari developer yang dapat mensetujui event yang di ajukan oleh penyelenggara.

Cara menjalankan :
1. Unduh repository dari Git,
2. Ekstrak dan taruh file pada lokasi C:xampp/htdocs/eventkita
3. Rename file env menjadi .env
4. Buka database localhost PhpMyAdmin lalu buat database bernama : eventkita
5. Import file database_eventkita.sql yang berada di folder htdoc/eventkita/ ke dalam database eventkita di PhpMyAdmin.
6. Ekstrak dan replace file php.ini.zip yang berada di htdoc/eventkita ke folder C:xampp/php/
7. Jika sudah jalankan xampp start bagian apache dan MySQL.
8. Open browser dan ketik localhost/eventkita/public/ untuk memulai menjalankan.
