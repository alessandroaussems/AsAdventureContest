<?php

namespace App\Http\Controllers;
use App\Participant;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use Input;

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
        $this->middleware('auth')->only('index');
        $this->middleware('auth')->only('destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();

        return view("participants")->with('participants',$participants);

    }
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return view("participate");
    }
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'adress'     => 'required' ,
            'city'       => 'required',
            'question'   => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('participants/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $participant = new Participant();
            $participant->name       = Input::get('name');
            $participant->email      = Input::get('email');
            $participant->adress     = Input::get('adress');
            $participant->city       = Input::get('city');
            $participant->question   = Input::get('question');
            $participant->ip         = Request::ip();

            $participant->save();

            // redirect
            Session::flash('message', 'Successfully participated!');
            return Redirect::to('participants');
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
}
