<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestManager;
use Illuminate\Http\Request;
// use Request;

class FindPetController extends Controller
{
    public function findDogs(Request $request)
    {
        // $currentURL = Request::url();
        // $apiQueryParameters = substr($currentURL, strpos($currentURL, "?"));
        $type = $request->get('type');
        $gender = $request->get('gender');
        $age = $request->get('age');
        $breed = $request->get('breed');
        $coat = $request->get('coat');
        $city = $request->get('city');

        $baseUrl = "animals?limit=100&type=" . $type;

        if ($gender != null && $gender != "any") {
            $baseUrl = $baseUrl . "&gender=" . $gender;
        }
        if ($age != null && $age != "any") {
            $baseUrl = $baseUrl . "&age=" . $age;
        }
        if ($breed != null && $breed != "any") {
            $baseUrl = $baseUrl . "&breed=" . $breed;
        }
        if ($coat != null && $coat != "any") {
            $baseUrl = $baseUrl . "&coat=" . $coat;
        }
        if ($city != null && $city != "any") {
            $baseUrl = $baseUrl . "&location=" . $city;
        }

        $baseUrl = str_replace(" ", "%20", $baseUrl);
        $pets = RequestManager::getRequest($baseUrl);
        $breeds = RequestManager::getRequest("types/" . $type . "/breeds");

        //$pets = $this->cleanPetsArr($pets);

        return view(
            'pets.filter-pets',
            [
                'pets' => $pets['animals'],
                'breeds' => isset($breeds) ? $breeds['breeds'] : '',
                'user' => $request->user()
            ]
        );
    }

    public function petProfile($id, $type)
    {
        $baseUrl = "animals/" . $id;
        $pet = RequestManager::getRequest($baseUrl)['animal'];
        if ($type == 'profile') {
            return view('pets.pet-profile', compact('pet'));
        } else {
            return view('pets.contact-owner', compact('pet'));
        }
    }
}
