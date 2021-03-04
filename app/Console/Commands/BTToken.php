<?php

namespace App\Console\Commands;

use App\Modules\BotTelegram\BotTelegram;
use Illuminate\Console\Command;

class BTToken extends Command
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
    protected $signature = 'telegram:token {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tambahkan token Bot Telegram';

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
     * @return int
     */
    public function handle()
    {
        /**
         * @var string
         */
        $token = $this->argument('token');

        $this->bottelegram->updateENV($token);

        $this->info('Token berhasil disimpan!');

        return 0;
    }
}
