<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\Characteristic;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PetsController extends Controller
{
    public function edit(Request $request){
        // Arrays for dropdown, radio buttons
        $age=['Baby','Young','Adult','Senior'];
        $gender=['Male','Female'];
        $characteristics=['Cute','Loyal','Friendly','Playful','Intelligent','Happy','Affectionate','Courageous'];
        $animal_types=['Dog','Cat','Rabbit','Fish','Bird','Other'];
        $coat_lengths=['Hairless','Short','Medium','Long'];

        // Getting data from characteristics table for specific pet
        $pets=Pet::with('characteristics')->get();
        return view('pets.pets',[
            'ages'=>$age,
            'genders'=>$gender,
            'characteristics'=>$characteristics,
            'animal_types'=>$animal_types,
            'coat_lengths'=>$coat_lengths,
            'user' => $request->user(),
            'pets'=>$pets,
        ]);
    }

    public function update(Request $request){
        // Validation
        $this->validate($request,[
            'petnameEdit' => 'required|string',
            'ageEdit' => 'required',
            'genderEdit' => 'required|string',
            'animalTypeEdit' => 'required|string',
            'colorEdit' => 'required|string',
            'characteristic' => 'required',
            'coatEdit' => 'required|string',
            'statusEdit'=>'required|string',
            'descriptionEdit' => 'required|string',

            'price' => 'required',
            'discountable' => 'sometimes',
            'discount_percent' => 'sometimes',
        ]);





        // Find pet by id
        $pet=Pet::find($request->get('idEdit'));
        $pet->pet_name=$request->get('petnameEdit');
        $pet->age=$request->get('ageEdit');
        $pet->gender=$request->get('genderEdit');
        $pet->animal_type=$request->get('animalTypeEdit');
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
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        DB::table('characteristics')->insert($data);
        return redirect()->route('pets.edit')->with('status', 'pet-updated');
    }

    public function destroy(Request $request){
        Characteristic::where('pet_id',$request->get('pet_id'))->delete();
        $pet=Pet::find($request->get('pet_id'));

        // Delete pet image from file system
        $destination='uploads/'.$pet->pet_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $pet->delete();
        return redirect()->route('pets.edit')->with('status', 'pet-deleted');
    }
}
