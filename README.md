# BELAJAR BOT TELEGRAM

Belajar Bot Telegram dengan menggunakan metode webhook

## install dependency yang diperlukan

`````````````````
composer install
`````````````````

## File .env

Beberapa yang perlu di setting di file .env

- Setting Database
- Setting Telegram Base Uri
- Setting Telegram Webhook URL

## Jalamkan Migrasi Database

````````````````````
php artisan migrate
````````````````````

## Jalankan Webhook

````````````````````````````````
php artsian telegram:setwebhook
````````````````````````````````


