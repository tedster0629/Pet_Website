<?php

namespace App\Http\Controllers;

class AcceptTermsController extends Controller
{
    public function see_conditions()
    {

        return view('pets.conditions');

    }

}
