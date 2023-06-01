<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddPetController extends Controller
{
    public function edit(Request $request)
    {
        return view('pets.add-pet', [
            'user' => $request->user(),
            'gender'=>['Male','Female'],
            'characteristics'=>['Cute','Loyal','Friendly','Playful','Intelligent','Happy','Affectionate','Courageous'],
            'age'=>['Baby','Young','Adult','Senior'],
            'animal_type'=>['Dog','Cat','Rabbit','Bird','Fish','Other'],
            'coat'=>['Hairless','Short','Medium','Long']
        ]);
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'pet_name' => 'required|string',
            'pet_image' => 'required',
            'age' => 'required',
            'gender' => 'required|string',
            'characteristic' => 'required',
            'animalType' => 'required|string',
            'coat' => 'required|string',
            'color' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'discountable' => 'sometimes',
            'discount_percent' => 'sometimes',
        ]);

        // Pet
        $pet = new Pet();
        $imagePath = time() . $request->pet_image->getClientOriginalName();
        $request->pet_image->move(public_path('uploads'), $imagePath);
        $pet->pet_image = $imagePath;

        $pet->user_id = $request->get('id');
        $pet->pet_name = $request->get('pet_name');
        $pet->age = $request->get('age');
        $pet->gender = $request->get('gender');
        $pet->animal_type = $request->get('animalType');
        $pet->coat_length = $request->get('coat');
        $pet->color = $request->get('color');
        $pet->description = $request->get('description');
        $pet->price = $request->get('price');
        $pet->discountable = $request->get('discountable');
        $pet->discount_percent = $request->get('discount_percent');
        $pet->save();


        // Adding characteristics in table
        $data = [];
        foreach ($request->characteristic as $c) {
            $data[] = [
                'pet_id' => $pet->id,
                'characteristic' => $c,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        DB::table('characteristics')->insert($data);

        return redirect()->route('add-pet.edit')->with('status', 'pet-added');
    }
}
