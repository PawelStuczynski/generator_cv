<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FormController extends Controller
{

    public function show ()
    {
        return view('form');
    }

    public function save (Request $request)
    {

        $form = new Form();
        $form -> image = $request->input('image');
        $form -> name = $request->input('name');
        $form -> surname = $request->input('surname');
        $form -> phone = $request->input('phone');
        $form -> email = $request->input('email');
        $form -> adress = $request->input('adress');
        $form -> zipcode = $request->input('zipcode');
        $form -> city = $request->input('city');
        $form -> birthdate = $request->input('birthdate');
        $form -> educations = json_encode($request->input('educations'));
        $form -> employers = json_encode($request->input('employers'));
        $form -> languages = json_encode($request->input('languages'));
        $form -> additional_abilities = $request->input('additional_abilities');
        $form -> interests = $request->input('interests');
        $form ->save();
    }

    public function fill()
    {
        return view('template');
    }
}
