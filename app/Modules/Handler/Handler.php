<?php

namespace App\Modules\Handler;

use App\Modules\BotTelegram\BotTelegramMessages;

class Handler
{
    /**
     * olah dan cek pesan sesuai dengan yang dikirimkan oleh pengguna
     * pertama cek data berupa message atau callback query
     * kedua cek message hanya mengandung (text/emoji) ataukah berupa gambar, dukumen dll.
     *
     * @param string $message
     * @return void
     */
    public function handle($message)
    {
        $result = BotTelegramMessages::decodeMessage($message);
        $type = BotTelegramMessages::messageType($result);

        if($type === 'MESSAGE'){

            $cek = BotTelegramMessages::messageCek($result);

            if($cek === 'MESSAGE'){

            } else{

            }

        } else if($type === 'CALLBACK_QUERY'){

        }


    }
}
