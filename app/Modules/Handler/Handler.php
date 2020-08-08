<?php

namespace App\Modules\Handler;

use App\Modules\BotTelegram\BotTelegramMessages;

class Handler
{
    public function handle($message)
    {
        $result = BotTelegramMessages::decodeMessage($message);
        $type = BotTelegramMessages::messageType($result);

    }
}
