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
}
