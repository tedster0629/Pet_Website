<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowItWorksController extends Controller
{
    public function edit(Request $request)
    {
        return view('pets.how-it-works', [
            'user' => $request->user()
        ]);
    }
}
