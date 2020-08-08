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

}
