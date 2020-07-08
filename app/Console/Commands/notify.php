<?php

namespace App\Console\Commands;

// use App\User;
use App\Models\File;
use App\Models\School;
use App\Mail\NotifyEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all user every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $users =User::select('email')->get();
        $emails =School::pluck('email')->toArray();
        $data =['title'=>'eny title' , 'body'=>'ene body'];
        if (!is_array($emails) and $emails != null) {
            # code...
            File::create([
                'no'=>$emails,
                
            ]);
            // Mail::to($emails)->send(new NotifyEmail($data));
        }else{
            foreach ($emails as $email) {
                # how to send email 
                File::firstOrCreate([
                    'no'=>$email,
                    
                ]);
                // Mail::to($email)->send(new NotifyEmail($data));
            }
        }
    }
}
