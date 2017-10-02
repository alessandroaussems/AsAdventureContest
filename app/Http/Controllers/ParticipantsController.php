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
        $this->middleware('auth', ['except' => ['create','store']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::where('enabled',1)->get();

        return view("participants")->with('participants',$participants);

    }
    public function create()
    {
        return view("participate");
    }
    public function store()
    {
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
            // store
            $participant = new Participant();
            $participant->name       = Input::get('name');
            $participant->email      = Input::get('email');
            $participant->adress     = Input::get('adress');
            $participant->city       = Input::get('city');
            $participant->question   = Input::get('question');
            $participant->ip         = Request::ip();
            $participant->date_participated = $now;
            $participant->period=$period;

            $participant->save();

            // redirect
            Session::flash('message', 'Successfully participated!');
            return Redirect::to('/');
        }
    }
    public function destroy($id)
    {
        // delete
        $participant = Participant::find($id);
        $participant->enabled       = 0;
        $participant->save();

        // redirect
        Session::flash('message', 'Successfully disabled participant!');
        return Redirect::to('participants');
    }
    public function excel()
    {
        Excel::create('Participants', function($excel) {

            $excel->sheet('Participants', function($sheet) {

                $sheet->fromArray(Participant::where('enabled',1)->get(), null, 'A1', false, false);

            });

        })->download('xlsx');
    }
}
