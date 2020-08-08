<?php

namespace App\Modules\BotTelegram;

class BotTelegramMessages
{
    /**
     * json decode $message dari telegram bot
     *
     * @param string $message
     * @return array
     */
    public static function decodeMessage(string $message)
    {
        return json_decode($message, true);
    }

    /**
     * Cek tipe data dari bot telegram
     * Apakah data bertipe message atau data bertipe callback_query
     *
     * @param array $result
     * @return string
     */
    public static function messageType(array $result)
    {
        $data = 'OTHER';

        if(array_key_exists('message', $result)){

            $data = 'MESSAGE';

        } elseif(array_key_exists('callback_query', $result)){

            $data = 'CALLBACK_QUERY';

        }

        return $data;

    }
}
