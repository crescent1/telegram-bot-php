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

    /**
     * teks untuk remove keyboard
     *
     * @return string
     */
    public function removeKeyboardText()
    {
        $text = 'Keyboard berhasil dihapus, gunakan perintah /start untuk mulai!';

        return $text;
    }

    /**
     * teks untuk message yang tidak teridentifikasi
     *
     * @return string
     */
    public function otherText()
    {
        $text = 'Pesan tidak bisa di identifikasi, silahkan gunakan perintah yang telah disediakan atau gunakan tombol!';

        return $text;
    }



}
