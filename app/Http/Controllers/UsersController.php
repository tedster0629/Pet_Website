<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\ContactMail;
use App\Models\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function edit(Request $request){
        $users=User::all();
        return view('pets.users',['user'=>$request->user(),'users'=>$users]);
    }
    public function update(Request $request){
        // Validation
        $this->validate($request,[
            'fnameEdit'=>'required|string',
            'lnameEdit'=>'required|string',
            'emailEdit'=>'required|email',
            'phoneEdit'=>'required|digits:10|numeric',
            'addressEdit'=>'required|string',
            'cityEdit'=>'required|string',
            'provinceEdit'=>'required',
            'postalcodeEdit'=>'required|string|min:6|max:6',

        ]);

        $user=User::find($request->get('idEdit'));

        $user->fname=$request->get('fnameEdit');
        $user->lname=$request->get('lnameEdit');
        $user->email=$request->get('emailEdit');
        $user->phone=$request->get('phoneEdit');
        $user->street=$request->get('addressEdit');
        $user->city=$request->get('cityEdit');
        $user->province=$request->get('provinceEdit');
        $user->postal_code=$request->get('postalcodeEdit');

        $user->save();
        return redirect()->route('users.edit')->with('status', 'user-profile-updated');
    }
    public function destroy(Request $request){
        $user=User::find($request->get('id'));
        $user->delete();
        return redirect()->route('users.edit')->with('status', 'user-profile-deleted');
    }

    public function sendEmail(Request $request, $type) {
        if ($type == 'admin') {
            $mail = 'Rutvik.joshi@live.com';
        } else {
            $mail = $request->receiver_email;
        }
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Message::insert($details);
        Mail::to($mail)->send(new ContactMail($details));
        return redirect()->back()->with('status', 'email-sent');
    }
}
