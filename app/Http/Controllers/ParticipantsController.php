<?php

namespace App\Http\Controllers;
use App\Participant;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ParticipantsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
