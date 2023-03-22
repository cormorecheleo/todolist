<?php

namespace App\Console\Commands;

use App\Jobs\SendMailJob;
use App\Mail\HelloMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        SendMailJob::dispatch();
        //Mail::to("test@test.com")->send(new HelloMail());
    }
}
