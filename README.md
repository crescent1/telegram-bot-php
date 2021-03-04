# BELAJAR BOT TELEGRAM

Belajar Telegram Bot dengan menggunakan metode webhook

## Install dependency yang diperlukan

`````````````````
composer install
`````````````````

## File .env

Beberapa yang perlu di setting di file .env

- Setting Database
- Setting Telegram Base Uri
- Setting Telegram Webhook URL

## Jalankan Migrasi Database

````````````````````
php artisan migrate
````````````````````

## Jalankan Webhook

````````````````````````````````
php artsian telegram:setwebhook
````````````````````````````````


