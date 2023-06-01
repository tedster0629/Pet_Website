<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit(Request $request){
        return view('pets.contact',['user'=>$request->user()]);
    }
}
