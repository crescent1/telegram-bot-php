# BELAJAR TELEGRAM BOT (PHP-LARAVEL)

Belajar Telegram Bot dengan menggunakan metode webhook. Menggunakan bahasa pemrograman PHP dengan memanfaatkan framework Laravel.
- Lihat dokumentasi penggunaan laravel [disini](https://laravel.com/docs/8.x)
- Lihat dokumentasi penggunaan telegram bot [disini](https://core.telegram.org/bots/api)

## Install dependency yang diperlukan

Install dependency yang diperlukan untuk menjalankan app.

`````````````````
composer install
`````````````````

atau 

`````````````````
composer update
`````````````````

## Insert Token

Input token telegram bot dengan menggunakan command:

````````````````````````````````````````````````
php artisan telegram:token {telegram bot token}
````````````````````````````````````````````````
Atau bisa juga inputkan token secara manual di file .env

## File .env

Beberapa yang perlu di setting di file .env

- Setting Database
- Setting Telegram Webhook URL

## Jalankan Migrasi Database

Tambahkan database yang diperlukan untuk telegram bot

````````````````````
php artisan migrate
````````````````````

## Jalankan Webhook

Jalankan fungsi webhook telegram bot dengan menggunakan command berikut:

````````````````````````````````
php artsian telegram:setwebhook
````````````````````````````````


