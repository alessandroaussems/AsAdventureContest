<?php

namespace App\Http\Controllers;
use App\Participant;
use App\Period;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use Input;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Facades\Mail;
use Socialite;


class ParticipantsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => ['create','store','redirectToProvider','handleProviderCallback']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns all particpants where enabled is set to true in the array participants
        $participants = Participant::where('enabled',1)->get();

        return view("participants")->with('participants',$participants);

    }
    public function redirectToProvider()
    {
        //redirect to provider
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {
        //retrieve data from provider and put it in the session "userdata"
        $user = Socialite::driver('github')->user();
        $user_data[]=$user["name"];
        $user_data[]=$user["email"];
        $user_data[]=$user["location"];
        Session::put('userdata', $user_data);
        return redirect('/participate');
    }
    public function store()
    {
        //store a new participant
        $periods=Period::all();
        $now=Carbon::now();
        $period=0;
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email|unique:participants',
            'adress'     => 'required' ,
            'city'       => 'required',
            'question'   => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('participate')
                ->withErrors($validator)
                ->withInput();
        } else
            {
                foreach ($periods as $key => $value)
                {
                    if($value->startdate <= $now && $now <= $value->enddate)
                    {
                        $period=$value->id;
                    }
                }
                $question=Input::get('question');
                if($question=="1995")
                {
                    $isquestioncorrect=true;
                }
                else
                {
                    $isquestioncorrect=false;
                }
            // store
            $participant = new Participant();
            $participant->name       = Input::get('name');
            $participant->email      = Input::get('email');
            $participant->adress     = Input::get('adress');
            $participant->city       = Input::get('city');
            $participant->question   = $isquestioncorrect;
            $participant->ip         = Request::ip();
            $participant->date_participated = $now;
            $participant->period=$period;

            $participant->save();

            // redirect
            Session::flash('message', 'Successfully participated!');
            return Redirect::to('/participate');
        }
    }
    public function destroy($id)
    {
        //set enabled to false in the table participants
        $participant = Participant::find($id);
        $participant->enabled       = 0;
        $participant->save();
        Session::flash('message', 'Successfully disabled participant!');
        return Redirect::to('participants');
    }
    public function excel()
    {
        //create sheet from array participants where enabled is true
        Excel::create('Participants', function($excel) {

            $excel->sheet('Participants', function($sheet) {

                $sheet->row(1, array('ID', 'Name','Email','Address','City','Question','IP','Period','Date participated','Period'));

                $sheet->fromArray(Participant::where('enabled',1)->get(), null, 'A2', false, false);


            });
        })->download("xlsx");
    }
}
