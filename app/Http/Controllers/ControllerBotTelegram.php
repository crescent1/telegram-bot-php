<?php

namespace App\Http\Controllers;

use App\Modules\Handler\Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ControllerBotTelegram extends Controller
{

    /**
     * Undocumented function
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function webhook(Request $request)
    {

        /**
         * dapatkan message dari telegram bot (semua data dari telegram bot dalam bentuk JSON)
         *
         * @var string $message
         */
        $message = $request->getContent();

        /**
         * olah data yang didapat sesuai kebutuhan
         */
        $handle = new Handler();
        $handle->handle($message);


        return response('OK', 200);

    }
}
