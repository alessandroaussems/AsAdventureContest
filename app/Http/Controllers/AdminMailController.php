<?php

namespace App\Http\Controllers;

use App\AdminMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Request;
use Input;


class AdminMailController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function edit($id)
    {
        $adminmail = AdminMail::find($id);
        return view("adminmail")->with('adminmail', $adminmail);
    }
    public function update($id)
    {
        // validate
        $rules = array(
            'adminmail' => 'required|email',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('adminmail/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            $adminmail = AdminMail::find($id);
            $adminmail->email = Input::get("adminmail");
            $adminmail->save();


            Session::flash('status', 'Successfully changed adminmail!');
            return Redirect::to('/dashboard');
        }
    }
}
