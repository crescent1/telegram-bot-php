<?php

namespace App\Modules\Handler;

use App\Modules\BotTelegram\BotTelegram;
use App\Modules\BotTelegram\BTKeyboards;
use App\Modules\BotTelegram\BTMessages;
use App\Modules\Items\Text;

class HCallbackQuery
{
    /**
     * set text (not used yet)
     *
     * @var \App\Modules\Items\Text $text
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
     * olah data callbackQuery
     *
     * @param array $result
     * @return void
     */
    public function handle(array $result)
    {
        /**
         * @var string $callbackID
         */
        $callbackID = $result['callback_query']['id'];

        /**
         * @var string $chatID
         */
        $chatID = $result['callback_query']['message']['chat']['id'];

        /**
         * @var string $messageID
         */
        $messageID = $result['callback_query']['message']['message_id'];

        /**
         * @var string $callbackData
         */
        $callbackData = strtoupper($result['callback_query']['data']);

        /**
         * @var string $fName
         */
        $fName = $result['callback_query']['message']['chat']['first_name'];

        /**
         * @var array $answerData
         */
        $answerData = [
            'callbackID' => $callbackID,
            'text' => 'OK'
        ];

        /**
         * siapkan data parameter untuk annswer callback query
         */
        $answerCallback = BTMessages::answerCallbackQuery($answerData);

        /**
         * kirimkan balasan callback query
         */
        $this->botTelegram->answerCallbackQuery($answerCallback);

        /**
         * salah satu cara cek $data
         * bisa mengunakan fungsi strpos() bila berisi data yang rumit
         */
        switch ($callbackData) {
            case 'BACK':

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
                 */
                $sendMessage = BTMessages::textMessage($data);

                /**
                 * bot membalas pesan ke user
                 */
                $this->botTelegram->sendMessage($sendMessage);
                break;

            case 'EDITTEXT':

                $text = Text::editText();
                $replyMarkup = BTKeyboards::inlineKeyboardEditText('BACKIM');

                $data = [
                    'chatID' => $chatID,
                    'messageID' => $messageID,
                    'text' => $text['text1'],
                    'replyMarkup' => $replyMarkup,

                ];

                $editText = BTMessages::editMessageText($data);

                $this->botTelegram->editMessageText($editText);

                break;

            case 'BACKIM' :
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
                    'messageID' => $messageID,
                    'text' => $text,
                    'replyMarkup' => $replyMarkup,
                ];

                /**
                 * isi data pada setiap parameter yang dibutuhkan
                 */
                $sendMessage = BTMessages::editMessageText($data);

                /**
                 * bot membalas pesan ke user
                 */
                $this->botTelegram->editMessageText($sendMessage);
                break;

            case 'EDITRM' :

                $replyMarkup = BTKeyboards::editKeyboardReplyMarkup();

                $data = [
                    'chatID' => $chatID,
                    'messageID' => $messageID,
                    'replyMarkup' => $replyMarkup,
                ];

                $editKeyboard = BTMessages::editMessageReplyMarkup($data);
                $this->botTelegram->editMessageReplyMarkup($editKeyboard);

                break;

            case 'EDITMD' :

                $text = Text::editTextPhoto();
                $replyMarkup = BTKeyboards::inlineKeyboardEditText('BACKPH');

                $data = [
                    'chatID' => $chatID,
                    'messageID' => $messageID,
                    'photo' => $text['photo'],
                    'text' => $text['text'],
                    'replyMarkup' => $replyMarkup,
                ];

                $editMedia = BTMessages::editMessageMedia($data);
                $this->botTelegram->editMessageMedia($editMedia);

                break;

            case 'BACKPH' :

                $text = Text::textPhoto();
                $replyMarkup = BTKeyboards::inlineKeyboardMarkupPhoto();

                /**
                 * @var array $data
                 */
                $data = [
                    'chatID' => $chatID,
                    'messageID' => $messageID,
                    'photo' => $text['photo'],
                    'text' => $text['text'],
                    'replyMarkup' => $replyMarkup,
                ];

                $sendPhoto = BTMessages::editMessageMedia($data);
                $this->botTelegram->editMessageMedia($sendPhoto);

                break;

            default:
                # code...
                break;
        }

    }

}
