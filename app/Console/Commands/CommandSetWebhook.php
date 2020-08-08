<?php

namespace App\Console\Commands;

use App\Modules\BotTelegram\BotTelegram;
use Illuminate\Console\Command;

class CommandSetWebhook extends Command
{
    /**
     * set bot telegram
     *
     * @var \App\Modules\BotTelegram\BotTelegram
     */
    protected $bottelegram;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:setwebhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setting untuk mengaktifkan fungsi webhook pada telegram bot.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BotTelegram $bottelegram)
    {
        parent::__construct();

        $this->bottelegram = $bottelegram;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->bottelegram->setWebhook();

        $headers = [
            'STATUS OK',
            'RESULT',
            'DESCRIPTION',
        ];

        $input = [
            [
                $data['ok'],
                $data['result'],
                $data['description']
            ]
        ];

        $this->table($headers, $input);
    }
}
