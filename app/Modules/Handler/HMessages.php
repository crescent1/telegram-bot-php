<?php

namespace App\Modules\Handler;

use Illuminate\Support\Facades\Log;

class HMessages
{
    private $text;

    public function __construct()
    {


    }
    /**
     * olah data message
     *
     * @param array $result
     * @return void
     */
    public function handle(array $result)
    {
        /**
         * @var string $chatID
         */
        $chatID = $result['message']['chat']['id'];

        /**
         * @var string $messageID
         */
        $messageID = $result['message']['message_id'];

        /**
         * @var string $message
         */
        $message = $result['message']['text'];

        /**
         * @var string $fName
         */
        $fName = $result['message']['chat']['first_name'];


        switch ($message) {
            case '/start':

                break;

            default:
                # code...
                break;
        }


    }

}
