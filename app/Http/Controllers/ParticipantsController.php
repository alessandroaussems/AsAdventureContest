<?php

namespace App\Http\Controllers;
use App\Participant;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

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
}