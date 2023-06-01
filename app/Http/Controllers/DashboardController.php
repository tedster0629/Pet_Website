<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function edit(Request $request)
    {

        $province_chart = DB::table("users")
            ->select(DB::raw('province,count(id) as count'))
            ->where('is_admin',0)
            ->groupBy("province")
            ->get();

        $pets_chart = DB::table("pets")
            ->select(DB::raw('animal_type,count(animal_type) as count'))
            ->whereNotNull("animal_type")
            ->groupBy("animal_type")
            ->get();

        $is_adopted = Pet::pluck('is_adopted');

        $pets_added_date = DB::table('pets')
            ->select(DB::raw('count(id) as count ,DATE(created_at) as date'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        return view('pets.dashboard', [
            'user' => request()->user(),
            'province_chart' => $province_chart,
            'pets_chart' => $pets_chart,
            'is_adopted' => $is_adopted,
            'pets_added_date' => $pets_added_date
        ]);
    }
}
