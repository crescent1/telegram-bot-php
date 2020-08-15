<?php

namespace App\Modules\Items;

class Text
{
    /**
     * teks pembukaan
     *
     * @return string
     */
    public static function welcome()
    {
        $text = 'Assalamualaikum, Selamat Datang!';

        return $text;
    }

    /**
     * teks untuk inline keyboard
     *
     * @return string
     */
    public static function inlineKeyboardText()
    {
        $text = 'Ini contoh inline keyboard!';

        return $text;
    }

    /**
     * teks untuk remove keyboard
     *
     * @return string
     */
    public static function removeKeyboardText()
    {
        $text = 'Keyboard berhasil dihapus, gunakan perintah /start untuk mulai!';

        return $text;
    }

    /**
     * teks untuk message yang tidak teridentifikasi
     *
     * @return string
     */
    public static function otherText()
    {
        $text = 'Pesan tidak bisa di identifikasi, silahkan gunakan perintah yang telah disediakan atau gunakan tombol!';

        return $text;
    }

    /**
     * siapkan text dan photo
     *
     * @return array
     */
    public static function textPhoto()
    {
        $text = 'Ini contoh Caption!';
        $photo = 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRy9LVpjaxOhg1zmVLWeBk5pWBfftKJOm1N1w&usqp=CAU';

        return [
            'text' => $text,
            'photo' => $photo,
        ];
    }

    /**
     * siapkan data phto dan caption baru
     *
     * @return array
     */
    public static function editTextPhoto()
    {
        $text = 'Ini Caption yang diedit!';
        $photo = 'https://images.unsplash.com/photo-1502759683299-cdcd6974244f?auto=format&fit=crop&w=440&h=220&q=60';

        return [
            'text' => $text,
            'photo' => $photo,
        ];

    }

    /**
     * set text for edit
     *
     * @return array
     */
    public static function editText()
    {
        return [
            'text1' => 'Ini adalah text baru!!',
            'text2' => 'Ini adalah caption baru!'
        ];

    }

    /**
     * contoh text menggunakan emoji
     *
     * @param array $emo
     * @return string
     */
    public static function emojiText($emo)
    {
        $text = $emo['smile'] . ' ' . $emo['dart'] . ' Ini adalah contoh penggunaan emoji' . $emo['seru'];

        return $text;
    }



}
