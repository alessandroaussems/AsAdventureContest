<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Period;
use App\Participant;
use App\Winners;

class Winner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pick:winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pick a winner at the end of the period';

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
        $periods = Period::all();
        $now=Carbon::today()->toDateString();
        foreach ($periods as $key => $value)
        {
            if($now == $value->enddate)
            {
                $period=$value->id;
                if(Winners::where('period',$value->id)->get()->isEmpty())
                {
                    $winnerofparticipants=Participant::where("question",1)->orderByRaw("RAND()")
                        ->take(1)
                        ->get();
                    $winner = new Winners();
                    $winner->participant     = $winnerofparticipants[0]->id;
                    $winner->period          = $period;
                    $winner->save();

                    $texttosend="There is a new winner! The name is:".$winnerofparticipants[0]->name;
                    Mail::raw($texttosend, function($message)
                    {
                        $message->subject('There is a new winner! AsAdventure Contest');
                        $message->from('no-reply@asadventurecontest.be', 'As Adventure Contest');
                        $message->to('alessandro.aussems@student.kdg.be');
                    });
                }
            }
        }
    }
}
