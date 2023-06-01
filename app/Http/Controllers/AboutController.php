<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $team = About::all();
        return view('pets.about-us', ['team' => $team,'user'=>$request->user()]);
    }

}
