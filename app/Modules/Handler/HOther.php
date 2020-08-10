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
        $chatId = $result['message']['chat']['id'];
        $messageId = $result['message']['message_id'];

        $data = [
            'chatID' => $chatId,
            'messageID' => $messageId,
        ];

        $deleteMessage = BTMessages::deleteMessage($data);

        $botTelegram = new BotTelegram();
        $botTelegram->deleteMessage($deleteMessage);

    }

}
