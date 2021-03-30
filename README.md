1 )
git clone https://github.com/Araik5004/laravel8.git

2 ) go into dir "laravel8" :
cd laravel8

3 ) run install :
composer install

4 )
create ".env" file from ".env.example" file

5 )
php artisan key:generate

6 )
add params to ".env" file for Database eg :
DB_DATABASE=laravel8
DB_USERNAME=root
DB_PASSWORD=root

7 ) migrate all tables :
php artisan migrate


8 ) add admin and other data :
php artisan db:seed

9 )
go to link https://your_domain/admin/login
user : admin@gmail.com
pass : admin

10 ) 
enjoy :) :)
