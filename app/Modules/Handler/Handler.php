<?php

namespace App\Modules\Handler;

use App\Modules\BotTelegram\BTMessages;

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
    public function handle(string $message)
    {
        /**
         * decode pesan dari user
         *
         * @var array $result
         */
        $result = BTMessages::decodeMessage($message);

        /**
         * cek type pesan dari user
         *
         * @var string $type
         */
        $type = BTMessages::messageType($result);
        if($type === 'MESSAGE'){

            /**
             * cek message dari user apa hanya berupa text atau gambar, dokumen dll
             *
             * @var string $cek
             */
            $cek = BTMessages::messageCek($result);
            if($cek === 'MESSAGE'){

                /**
                 * handle data type message
                 *
                 * @var \App\Modules\Handler\HMessages $handle
                 */
                $handle = new HMessages();
                $handle->handle($result);

            } else{

                /**
                 * handle data type lainnya (belum disediakan)
                 *
                 * @var \App\Modules\Handler\HOther $handle
                 */
                $handle = new HOther();
                $handle->handle($result);

            }

        } else if($type === 'CALLBACK_QUERY'){

            /**
             * handle data type callbackQuery
             *
             * @var \App\Modules\Handler\HCallbackQuery $handle
             */
            $handle = new HCallbackQuery();
            $handle->handle($result);

        }


    }
}
