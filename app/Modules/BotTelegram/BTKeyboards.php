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
                    'text' => 'INLINEKEYBOARD',
                ],
                [
                    'text' => 'REMOVE',
                ],
            ],
            [
                [
                    'text' => 'PHOTO',
                ]
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

    /**
     * menggunakan inlineKeyboard
     *
     * @return string
     */
    public static function inlineKeyboardMarkup()
    {
        /**
         * atur tampilan dan fungsi tombol sesuai kebutuhan
         *
         * @var array
         */
        $buttons = [
            [
                [
                    'text' => 'TEST ',
                    'callback_data' => 'test'

                ],
                [
                    'text' =>  'TEST',
                    'callback_data' => 'test'
                ],
            ],
            [
                [
                    'text' => 'BACK',
                    'callback_data' => 'back'
                ],

            ],
        ];

        /**
         * tambahkan parameter sesuai kebutuhan, kecuali yang wajib diisi
         *
         * @var mixed $inlineKeyboardMarkup
         */
        $inlineKeyboardMarkup = [
            'inline_keyboard' => $buttons,
        ];

        /**
         * jadikan data dalam bentuk JSON
         *
         * @var string $keyboard
         */
        $keyboard = json_encode($inlineKeyboardMarkup);

        return $keyboard;
    }

    /**
     * remove keyboard terbaru yang ditampilkan bot
     *
     * @return string
     */
    public static function replyKeyboardRemove()
    {
        $replyKeyboardRemove = [
            'remove_keyboard' => true,
        ];

        /**
         * @var string $keyboard
         */
        $keyboard = json_encode($replyKeyboardRemove);

        return $keyboard;
    }

}
