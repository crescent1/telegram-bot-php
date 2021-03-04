<?php

namespace App\Modules\Handler;

use App\Models\ModelPosition;
use App\Modules\BotTelegram\BotTelegram;
use App\Modules\BotTelegram\BTKeyboards;
use App\Modules\BotTelegram\BTMessages;
use App\Modules\Items\Emoji;
use App\Modules\Items\Text;
use Illuminate\Support\Facades\Log;

class HMessages
{
    /**
     * set text (not used yet)
     *
     * @var \App\Modules\Items\Text
     */
    private $text;

    /**
     * set BotTelegram
     *
     * @var \App\Modules\BotTelegram\BotTelegram
     */
    private $botTelegram;

    public function __construct()
    {
        $this->text = new Text();
        $this->botTelegram = new BotTelegram();


    }

    /**
     * olah data message
     *
     * @param array $result
     * @return void
     */
    public function handle(array $result)
    {
        /**
         * @var string $chatID
         */
        $chatID = $result['message']['chat']['id'];

        /**
         * @var string $messageID
         */
        $messageID = $result['message']['message_id'];

        /**
         * @var string $message
         */
        $message = $result['message']['text'];

        /**
         * @var string $fName
         */
        $fName = $result['message']['chat']['first_name'];


        switch ($message) {
            case '/start':

                /**
                 * siapkan text yang akan dikirim bot
                 */
                $text = Text::welcome();

                /**
                 * siapkan keyboard yang akan dikirim bot
                 */
                $replyMarkup = BTKeyboards::replyKeyboardMarkup();

                /**
                 * @var array $data
                 */
                $data = [
                    'chatID' => $chatID,
                    'text' => $text,
                    'replyMarkup' => $replyMarkup,
                ];

                /**
                 * isi data pada setiap parameter yang dibutuhkan
                 *
                 */
                $sendMessage = BTMessages::textMessage($data);

                /**
                 * bot membalas pesan ke user
                 */
                $this->botTelegram->sendMessage($sendMessage);

                break;

            case 'INLINEKEYBOARD':

                /**
                 * siapkan text inlineKeyboard
                 */
                $text = Text::inlineKeyboardText();

                /**
                 * siapkan inline Keyboard
                 */
                $replyMarkup = BTKeyboards::inlineKeyboardMarkup();

                /**
                 * @var array $data
                 */
                $data = [
                    'chatID' => $chatID,
                    'text' => $text,
                    'replyMarkup' => $replyMarkup,
                ];

                /**
                 * isi data pada setiap parameter yang dibutuhkan
                 */
                $sendMessage = BTMessages::textMessage($data);

                /**
                 * bot membalas pesan ke user
                 */
                $this->botTelegram->sendMessage($sendMessage);
                break;

            case 'REMOVE':

                /**
                 * siapkan text remove
                 */
                $text = Text::removeKeyboardText();

                /**
                 * siapkan remve Keyboard
                 */
                $replyMarkup = BTKeyboards::replyKeyboardRemove();

                /**
                 * @var array $data
                 */
                $data = [
                    'chatID' => $chatID,
                    'text' => $text,
                    'replyMarkup' => $replyMarkup,
                ];

                /**
                 * isi data pada setiap parameter yang dibutuhkan
                 */
                $sendMessage = BTMessages::textMessage($data);

                /**
                 * bot membalas pesan ke user
                 */
                $this->botTelegram->sendMessage($sendMessage);
                break;

            case 'PHOTO' :

                /**
                 * siapkan text balasan
                 */
                $text = Text::textPhoto();

                /**
                 * siapkan keyboard
                 */
                $replyMarkup = BTKeyboards::inlineKeyboardMarkupPhoto();

                /**
                 * @var array $data
                 */
                $data = [
                    'chatID' => $chatID,
                    'photo' => $text['photo'],
                    'text' => $text['text'],
                    'replyMarkup' => $replyMarkup,
                ];

                /**
                 * siapkan parameter yang akan dikirum
                 */
                $sendPhoto = BTMessages::textPhoto($data);

                /**
                 * kirimkan balasan ke user
                 */
                $this->botTelegram->sendPhoto($sendPhoto);

                break;

            case 'EMOJI' :

                /**
                 * psiapkan emoji
                 */
                $emo = Emoji::emoji();

                /**
                 * siapkan contoh text dengan emoji
                 */
                $text = Text::emojiText($emo);

                /**
                 * siapkan keybard dengan emoji
                 */
                $replyMarkup = BTKeyboards::inlineKeyboardMarkupWithEmoji($emo);

                /**
                 * @var array $data
                 */
                $data = [
                    'chatID' => $chatID,
                    'text' => $text,
                    'replyMarkup' => $replyMarkup,
                ];

                /**
                 * siapkan parameter pesan
                 */
                $sendMessage = BTMessages::textMessage($data);

                /**
                 * kirimkan pesan dengan emoji
                 */
                $this->botTelegram->sendMessage($sendMessage);
                break;

            default:

                /**
                 * cek apakakan ada data di database dengan mengukan $chatID
                 *
                 * @var object $data
                 */
                $data = ModelPosition::whereChatId($chatID)->first();

                if($data) {

                    /**
                     * @var string $posisi
                     */
                    $posisi = $data->posisi;

                    switch ($posisi) {

                        case 'value':
                            # buat sesuai kebutuhan
                            break;

                        default:
                            # buat sesuai kebutujhan
                            break;
                    }

                } else {

                    /**
                     * siapkan text bila pesan tidak teridentifikasi
                     */
                    $text = $this->text->otherText();

                    /**
                     * siapkan keybard
                     */
                    $replyMarkup = BTKeyboards::replyKeyboardMarkup();

                    /**
                     * @var array $data
                     */
                    $data = [
                        'chatID' => $chatID,
                        'text' => $text,
                        'replyMarkup' => $replyMarkup,
                    ];

                    /**
                     * siapkan parameter
                     */
                    $sendMessage = BTMessages::textMessage($data);

                    /**
                     * kirim pesan ke user
                     */
                    $this->botTelegram->sendMessage($sendMessage);

                }

                break;
        }


    }

}
