<?php

namespace App\Modules\Items;

class Emoji
{
    /**
     * siapkan data emoji
     * tambahkan sesuai kebutuhan
     *
     * @return array
     */
    public static function emoji()
    {
        return [
            'smile' => json_decode('"\ud83d\ude0a"'),
            'seru' => json_decode('"\u203c\ufe0f"'),
            'dart' => json_decode('"\ud83c\udfaf"'),
        ];
    }
}
