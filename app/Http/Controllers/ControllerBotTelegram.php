<?php

namespace App\Http\Controllers;

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
        $message = $request->getContent();

        // Log::info($message);

        return response('OK', 200);

    }
}
