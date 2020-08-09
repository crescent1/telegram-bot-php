<?php

namespace App\Modules\BotTelegram;

class BTKeyboards
{
    /**
     * Setiap keyboard harus dalam bentuk JSON!!!
     *
     */

    /**
     * menggunakan type keyboard (ReplyKeyboardMarkup)
     * untuk lebih jelas lihat di dokumentasi api telegram bot
     * https://core.telegram.org/bots/api#replykeyboardmarkup

     * @return string
     */
    public static function replyKeyboardMarkup()
    {
        /**
         * atur tampilan dan fungsi tombol sesuai kebutuhan
         *
         * @var array
         */
        $buttons = [
            [
                [
                    'text' => 'CALLBACK',
                ],
                [
                    'text' => 'TEST',
                ],
            ],
        ];

        /**
         * tambahkan parameter sesuai kebutuhan, kecuali yang wajib diisi
         *
         * @var mixed $ReplyKeyboardMarkup
         */
        $ReplyKeyboardMarkup = [
            'keyboard' => $buttons,
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
        ];

        /**
         * jadikan data dalam bentuk JSON
         *
         * @var string $keyboard
         */
        $keyboard = json_encode($ReplyKeyboardMarkup);

        return $keyboard;

    }

}
