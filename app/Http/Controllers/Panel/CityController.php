<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();

        return view('panel.cities.index', compact('cities'));
    }


    public function create()
    {
        return view('panel.cities.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30|unique:cities,name'
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->save();

        return redirect()->route('panel.cities.index');
    }


    public function show(City $city)
    {
        //
    }


    public function edit(City $city)
    {
        return view('panel.cities.edit', compact('city'));
    }


    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30'
        ]);

        if ($city->name != $request->name && City::where('name', $request->name)->count())
            return back();

        $city->name = $request->name;
        $city->save();

        return redirect()->route('panel.cities.index');
    }


    public function destroy(City $city)
    {
        //
    }
}
