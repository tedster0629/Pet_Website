<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Models\Pet;
use App\Models\Characteristic;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $provinces=['Alberta','British Columbia','Manitoba','New Brunswick','New Foundland and Labrador','Northwest Territories','Nova Scotia','Nunavut','Ontario','Prince Edward Island','Quebec','Saskatchewan','Yukon Territory'];
        $age=['Baby','Young','Adult','Senior'];
        $gender=['Male','Female'];
        $characteristics=['Cute','Loyal','Friendly','Playful','Intelligent','Happy','Affectionate','Courageous'];
        $coat_lengths=['Hairless','Short','Medium','Long'];

        $pets=Pet::with('characteristics')->where('user_id',$request->user()->id)->get();
        return view('pets.profile', [
            'provinces'=>$provinces,
            'ages'=>$age,
            'genders'=>$gender,
            'characteristics'=>$characteristics,
            'coat_lengths'=>$coat_lengths,
            'user' => $request->user(),
            'pets'=>$pets
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        if($request->hasFile('image')){
            $destination='uploads/'.$request->user()->image;
            if(File::exists($destination)){
                if($destination!='uploads/user.png'){
                    File::delete($destination);
                }
            }
            $imagePath=time().$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'),$imagePath);
            $request->user()->image=$imagePath;
        }

        $request->user()->fname=$request->get('fname');
        $request->user()->lname=$request->get('lname');
        $request->user()->phone=$request->get('phone');
        $request->user()->street=$request->get('streetAddress');
        $request->user()->city=$request->get('city');
        $request->user()->province=$request->get('province');
        $request->user()->postal_code=strtoupper($request->get('postal_code'));

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function petUpdate(Request $request){
        // Validation
        $this->validate($request,[
            'petnameEdit' => 'required|string',
            'ageEdit' => 'required',
            'genderEdit' => 'required|string',
            'colorEdit' => 'required|string',
            'characteristic' => 'required',
            'coatEdit' => 'required|string',
            'statusEdit'=>'required|string',
            'descriptionEdit' => 'required|string'
        ]);
        
        $pet=Pet::find($request->get('idEdit'));
        $pet->pet_name=$request->get('petnameEdit');
        $pet->age=$request->get('ageEdit');
        $pet->gender=$request->get('genderEdit');
        $pet->color=$request->get('colorEdit');
        $pet->coat_length=$request->get('coatEdit');
        $pet->is_adopted=$request->get('statusEdit');
        $pet->description=$request->get('descriptionEdit');
        $pet->save();
        
        // First delete all the characteristics for that pet_id then insert new records
        Characteristic::where('pet_id',$request->get('idEdit'))->delete();
        $data = [];
        foreach ($request->characteristic as $c) {
            $data[] = [
                'pet_id' => $request->get('idEdit'),
                'characteristic' => $c,
                'created_at'=>$pet->created_at,
                'updated_at'=>$pet->updated_at,
            ];
        }
        DB::table('characteristics')->insert($data);
        return redirect()->route('profile.edit')->with('status', 'pet-updated');
    }

    /**
     * Logout user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }

    // Delete Pet Record
    public function petDelete(Request $request){
        Characteristic::where('pet_id',$request->get('pet_id'))->delete();
        Pet::find($request->get('pet_id'))->delete();
        return redirect()->route('profile.edit')->with('status', 'pet-deleted');
    }
}
