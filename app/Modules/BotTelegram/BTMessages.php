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
     * Bisa dikembangkan sesuai kebutuhan, bila memerlukan data berupa gambar, dokumen atau yang lain
     *
     * @param array $result
     * @return string
     */
    public static function messageCek(array $result)
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
     * @param array $data
     * @return array
     */
    public static function textMessage(array $data)
    {
        $pesan = [
            'chat_id' => $data['chatID'],
            'text' => $data['text'],
            'parse_mode' => 'HTML',
            'disable_web_page_preview' => true,
        ];

        if (isset( $data['replyMarkup'])) {

            $pesan['reply_markup'] = $data['replyMarkup'];
        }

        return $pesan;

    }

    /**
     * siapkan data sesuai dengan parameter yang dibutuhkan untuk mengirim photo
     *
     * @param array $data
     * @return array
     */
    public static function textPhoto(array $data)
    {
        $pesan = [
            'chat_id' => $data['chatID'],
            'photo' => $data['photo'],
            'caption' => $data['text'],
            'parse_mode' => 'HTML',
        ];

        if (isset( $data['replyMarkup'])) {

            $pesan['reply_markup'] = $data['replyMarkup'];
        }

        return $pesan;

    }

    /**
     * fungsi untuk menghapus pesan
     *
     * @param array $data
     * @return array
     */
    public static function deleteMessage(array $data)
    {
        $pesan = [
            'chat_id' => $data['chatID'],
            'message_id' => $data['messageID'],
        ];

        return $pesan;

    }

    /**
     * set untuk menjawab callback query
     *
     * @param array $data
     * @return array
     */
    public static function answerCallbackQuery(array $data)
    {
        $pesan = [
            'callback_query_id' => $data['callbackID'],
            'text' => $data['text'],
        ];

        return $pesan;
    }

    /**
     * set parameter edit message text
     *
     * @param array $data
     * @return array
     */
    public static function editMessageText(array $data)
    {
        $pesan = [
            'chat_id' => $data['chatID'],
            'message_id' => $data['messageID'],
            'text' => $data['text'],
            'parse_mode' => 'HTML',
        ];

        if (isset( $data['replyMarkup'])) {

            $pesan['reply_markup'] = $data['replyMarkup'];
        }

        return $pesan;

    }

    /**
     * parameter yang digunakan untuk mengganti hanya keyboard saja
     *
     * @param array $data
     * @return array
     */
    public static function editMessageReplyMarkup(array $data)
    {
        $pesan = [
            'chat_id' => $data['chatID'],
            'message_id' => $data['messageID'],
        ];

        if (isset( $data['replyMarkup'])) {

            $pesan['reply_markup'] = $data['replyMarkup'];
        }

        return $pesan;

    }

    /**
     * parameter untuk mengedit media
     *
     * @param array $data
     * @return array
     */
    public static function editMessageMedia(array $data)
    {
        /**
         * contoh mengunakan media photo
         */
        $mediaPhoto = [
            'type' => 'photo',
            'media' => $data['photo'],
            'caption' => $data['text'],
            'parse_mode' => 'HTML'
        ];

        $pesan = [
            'chat_id' => $data['chatID'],
            'message_id' => $data['messageID'],
            'media' => json_encode($mediaPhoto), // ubah menjadi JSON
        ];

        if (isset( $data['replyMarkup'])) {

            $pesan['reply_markup'] = $data['replyMarkup'];
        }

        return $pesan;

    }

    /**
     * parameter untuk sendMediaGroup
     *
     * @param array $data
     * @return array
     */
    public static function sendMediaGroup(array $data)
    {
        $mediaPhoto = [
            [
                'type' => 'photo',
                'media' => $data['photo'],
                'caption' => $data['text'],
                'parse_mode' => 'HTML'
            ],
            [
                'type' => 'photo',
                'media' => $data['photo'],
                'caption' => $data['text'],
                'parse_mode' => 'HTML'
            ],
            [
                'type' => 'photo',
                'media' => $data['photo'],
                'caption' => $data['text'],
                'parse_mode' => 'HTML'
            ],

        ];

        $pesan = [
            'chat_id' => $data['chatID'],
            'media' => json_encode($mediaPhoto), // ubah menjadi JSON
        ];

        return $pesan;

    }
}
