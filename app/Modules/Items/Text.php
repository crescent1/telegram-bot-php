<?php

namespace App\Modules\Items;

class Text
{
    /**
     * teks pembukaan
     *
     * @return string
     */
    public function welcome()
    {
        $text = 'Assalamualaikum, Selamat Datang!';

        return $text;
    }

    /**
     * teks untuk inline keyboard
     *
     * @return string
     */
    public function inlineKeyboardText()
    {
        $text = 'Ini contoh inline keyboard!';

        return $text;
    }

}
