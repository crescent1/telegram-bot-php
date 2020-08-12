<?php

namespace App\Modules\Handler;

use App\Modules\BotTelegram\BotTelegram;
use App\Modules\BotTelegram\BTMessages;

class HOther
{
    /**
     * olah data other (belum disediakan)
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
         * @var array $data
         */
        $data = [
            'chatID' => $chatID,
            'messageID' => $messageID,
        ];

        /**
         * siapkan parameter yang akan dikirim
         *
         * @var array $deleteMessage
         */
        $deleteMessage = BTMessages::deleteMessage($data);

        $botTelegram = new BotTelegram();
        $botTelegram->deleteMessage($deleteMessage);

    }

}
