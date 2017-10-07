<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Winners;

class HomeController extends Controller
{
    public function index()
    {
        $winners=Winners::
        join('periods', 'period', '=', 'periods.id')
        ->join('participants', 'participant', '=', 'participants.id')
        ->select('periods.title', 'participants.name')
            ->get();
        return view("welcome")->with("winners",$winners);
    }
}
