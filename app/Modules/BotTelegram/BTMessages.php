<?php

namespace App\Modules\BotTelegram;

class BTMessages
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

    /**
     * cek tipe data message. apa hanya berisi text, gambar, atau dokumen
     *
     * @param array $result
     * @return string
     */
    public static function messageCek($result)
    {
        $data = 'OTHER';

        if (array_key_exists('text', $result['message'])){

            $data = 'MESSAGE';
        }

        return $data;
    }

    /**
     * Siapkan data yang akan dikirim oleh bot ke user sesuai parameter yang dibutuhkan
     *
     * @param mixed $data
     * @return array
     */
    public static function textMessage($data)
    {
        $pesan = [
            'chat_id' => $data['chatID'],
            'text' => $data['text'],
            'parse_mode' => 'HTML',
            'disable_web_page_preview' => true,
        ];

        if ($data['replyMarkup']) {

            $pesan['reply_markup'] = $data['replyMarkup'];
        }

        return $pesan;

    }
}
