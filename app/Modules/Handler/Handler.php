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
        /**
         * decode pesan dari user
         */
        $result = BotTelegramMessages::decodeMessage($message);

        /**
         * cek type pesan dari user
         */
        $type = BotTelegramMessages::messageType($result);

        if($type === 'MESSAGE'){

            /**
             * cek message dari user apa hanya berupa text atau gambar, dokumen dll
             */
            $cek = BotTelegramMessages::messageCek($result);

            if($cek === 'MESSAGE'){

            } else{

            }

        } else if($type === 'CALLBACK_QUERY'){

        }


    }
}
