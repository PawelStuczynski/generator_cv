<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show ()
    {
        return view('form');
    }

    public function save (Request $request)
    {
       // dd($request->all());
        Form::create($request->all());
    }
}
