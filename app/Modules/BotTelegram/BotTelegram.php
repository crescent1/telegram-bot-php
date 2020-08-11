<?php

namespace App\Modules\BotTelegram;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class BotTelegram
{
    /**
     * @var \GuzzleHttp\Client $http
     */
    private $http;


    public function __construct()
    {
        $this->http = new Client([
            'base_uri' => config('bottelegram.base_uri'),
        ]);

    }

    /**
     * Setting untuk mengaktifkan fungsi webhook pada telegram bot
     *
     * @return array
     */
    public function setWebhook()
    {
        $response = $this->http->post('setWebhook', [
            'form_params' => [
                'url' => config('bottelegram.webhook_url')
            ],

        ]);

        /**
         * dapatkan data dari request ke bot API
         * @var string $result
         */
        $result = $response->getBody()->getContents();

        /**
         * json_dcode data
         *
         * @var array $data
         */
        $data = BTMessages::decodeMessage($result);

        return $data;

    }

    /**
     * kirim pesan dengan method sendMessage
     *
     * @param array $sendMessage
     * @return void
     */
    public function sendMessage(array $sendMessage)
    {
        $this->http->post('sendMessage', [
            'form_params' => $sendMessage
        ]);
    }

    /**
     * delete pesan yang tidak sesuai/tidak teridentifikasi
     *
     * @param array $deleteMessage
     * @return void
     */
    public function deleteMessage(array $deleteMessage)
    {
        $this->http->post('deleteMessage', [
            'form_params' => $deleteMessage
        ]);
    }

    /**
     * mengirim pesan dengan menampilkan photo
     *
     * @param array $sendPhoto
     * @return void
     */
    public function sendPhoto(array $sendPhoto)
    {
        $this->http->post('sendPhoto', [
            'form_params' => $sendPhoto
        ]);
    }

    /**
     * kirim balasan untuk callback query
     * lihat detal di https://core.telegram.org/bots/api#callbackquery -> 'NOTE'
     *
     * @param array $answerCallbackQuery
     * @return void
     */
    public function answerCallbackQuery(array $answerCallbackQuery)
    {
        $this->http->post('answerCallbackQuery',  [
            'form_params' => $answerCallbackQuery
        ]);
    }

    /**
     * kirimkan balasan edit pesan
     *
     * @param array $editMessageText
     * @return void
     */
    public function editMessageText(array $editMessageText)
    {
        $this->http->post('editMessageText', [
            'form_params' => $editMessageText
        ]);
    }

    /**
     * digunakan hanya untuk mengedit keyboard saja dan tidak mengganti pesan
     *
     * @param array $editMessageReplyMarkup
     * @return void
     */
    public function editMessageReplyMarkup(array $editMessageReplyMarkup)
    {
        $this->http->post('editMessageReplyMarkup', [
            'form_params' => $editMessageReplyMarkup
        ]);
    }

}
