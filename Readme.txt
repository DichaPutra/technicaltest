Persyaratan Awal :
- Telah menginstall XAMPP MariaDB
- Telah menginstall Composer
- Telah menginstall GIthub

Langkah-langkah installasi (Dengan Github Repository) : 
-Menuju ke dir htdocs tempat XAMPP di install
-Jalankan CLI bebas (Command Prompt / Git Bash / Windows PowerShell)
-Clone Repository dengan menjalankan command 
	“git clone https://github.com/DichaPutra/technicaltest.git”
-Jika telah selesai maka source code telah berhasil diclone pada htdocs
-Masih pada CLI, masuk ke dalam dir technicaltest.
	“cd technicaltest”
-Stelah masuk ke dir technicaltest, install composer.
	“composer install”
-Copy file .env.example dan rename menjadi .env
-Masuk ke phpMyAdmin , buat database dengan nama “technicaltest”. 
 Pastikan XAMPP Apache dan MYSQL telah Start.
-Lakukan Migration deengan menjalankan command 
	“php artisan migrate”
-Generate APP_KEY value pada file .env dengan command
	“php artisan key:generate”
-Run local test dengan command
	“php artisan serve”
-Aplikasi telah dapat di akses pada browser 
 dengan alamat mengakses alamat URL http://127.0.0.1:8000/

Login Info

Admin
- username : admin
- pass : 123123123

User 
- username : user
- pass : 123123123 