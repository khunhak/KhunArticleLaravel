<?php

namespace App\Console\Commands;

use App\Mail\MarketingMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMarketingEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-marketing-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Subscribers mail, customers mail
        Mail::to('mgmg@gmail')->queue(new MarketingMail());
    }
}
