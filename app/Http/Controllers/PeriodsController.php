<?php

namespace App\Http\Controllers;
use App\Period;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use Input;
use DateTime;



class PeriodsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all periods in the array periods
        $periods = Period::all();

        return view("periods")->with('periods',$periods);

    }
    public function edit($id)
    {
        //return template edit period with data from selected period
        $period = Period::find($id);
        return view("editperiod")->with('period', $period);
    }
    public function update($id)
    {
        // validate
        $rules = array(
            'startdate'      => 'required|date',
            'enddate'     => 'required|date' ,

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('periods/'. $id .'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $time_start = strtotime(Input::get('startdate'));
            $formatstart = date('Y-m-d',$time_start);
            $time_end = strtotime(Input::get('enddate'));
            $formatend = date('Y-m-d',$time_end);


            $period                 = Period::find($id);
            $period->startdate      = $formatstart;
            $period->enddate         = $formatend;
            $period->save();


            Session::flash('message', 'Successfully added!');
            return Redirect::to('/periods');
        }
    }
}
