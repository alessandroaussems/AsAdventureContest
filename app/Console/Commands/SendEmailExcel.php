<?php

namespace App\Console\Commands;
use App\Participant;
use Illuminate\Console\Command;
use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class SendEmailExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Email with excel attachment of participants';

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
        //create an excelfile of particpants where datajoined is today and enabled is set to true
        Excel::create("Participants", function($excel) {

            $excel->sheet("Participants", function($sheet) {
                $sheet->row(1, array('ID', 'Name','Email','Address','City','Question','IP','Period','Date participated','Period'));

                $sheet->fromArray(Participant::where('enabled',1)->where('date_participated',Carbon::today())->get(), null, 'A2', false, false);

            });
        })->store('xls', false, true)["full"]; //store the created excelfile

        //Mail the file we just stored
        Mail::raw("In attachment excelfile of participants who joined today!", function($message)
        {
            $message->subject('ExcelFile Participants!');
            $message->from('no-reply@asadventurecontest.be', 'As Adventure Contest');
            $message->to('asadventurecontest@alessandro.aussems.mtantwerp.eu');
            $message->attach( realpath('storage/exports/Participants.xls'));
        });
    }
}
