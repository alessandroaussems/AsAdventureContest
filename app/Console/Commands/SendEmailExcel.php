<?php

namespace App\Console\Commands;
use App\Participant;
use Illuminate\Console\Command;
use Excel;
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
        Excel::create("Participants", function($excel) {

            $excel->sheet("Participants", function($sheet) {

                $sheet->fromArray(Participant::where('enabled',1)->get(), null, 'A1', false, false);

            });
        })->store('xls', false, true)["full"];
        Mail::raw("In attachment excelfile of participants ", function($message)
        {
            $message->subject('ExcelFile Participants!');
            $message->from('no-reply@asadventurecontest.be', 'As Adventure Contest');
            $message->to('alessandro.aussems@student.kdg.be');
            $message->attach( realpath('storage/exports/Participants.xls'));
        });
    }
}
