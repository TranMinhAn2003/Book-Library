<?php

namespace App\Console\Commands;

use App\Models\Borrow;
use Carbon\Carbon;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nearBook=Borrow::with('user','book')->where('due_date','<=',Carbon::now()->addMinutes(25))->get();
        foreach ($nearBook as $item){
            Mail::send('email.remail',['borrow' => $item],function ($message) use ($item){
                $message->subject('Book Library - Thông báo thời gian trả sách');
                $message->to($item->user->email,$item->user->name);
            });
        }
        $this->info('Emails đã được gửi thành công.');
    }
}
