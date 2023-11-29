<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|min:3|max:30'
        ]);

        $people = Person::where('firstname', 'LIKE', '%' . $request->search . '%')
            ->orWhere('lastname', 'LIKE', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->get();

        return view('panel.people.index', compact('people'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'parent' => 'nullable|exists:people,id'
        ]);

        $cities = City::get();
        $males = Person::where('gender', 'male')->get();
        $females = Person::where('gender', 'female')->get();

        $father = null;
        $mother = null;

        if ($request->parent) {
            $parent = Person::where('id', $request->parent)->first();

            if ($parent->gender == 'female')
                $mother = $parent;
            else
                $father = $parent;
        }

        return view('panel.people.create', compact('cities', 'males', 'females', 'mother', 'father'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'city'      => 'required|exists:cities,id',
            'father'    => 'nullable|exists:people,id',
            'mother'    => 'nullable|exists:people,id',
            'gender'    => 'required|string|min:4|max:6',
            'firstname' => 'required|string|min:2|max:50',
            'nickname'  => 'nullable|string|min:2|max:50',
            'lastname'  => 'required|string|min:2|max:50',
            'national'  => 'nullable|string|size:10',
            'note'      => 'nullable|string'
        ]);

        $person = new Person();
        $person->city = $request->city;
        $person->father = $request->father;
        $person->mother = $request->mother;
        $person->gender = $request->gender;
        $person->firstname = $request->firstname;
        $person->nickname = $request->nickname;
        $person->lastname = $request->lastname;
        $person->national = $request->national;
        $person->note = $request->note;
        $person->save();

        return redirect()->route('panel.people.index');
    }


    public function show(Person $person)
    {
        return view('panel.people.show', compact('person'));
    }


    public function edit(Person $person)
    {
        $cities = City::get();
        $males = Person::where('gender', 'male')->get();
        $females = Person::where('gender', 'female')->get();

        return view('panel.people.edit', compact('person', 'cities', 'males', 'females'));
    }


    public function update(Request $request, Person $person)
    {
        $request->validate([
            'city'      => 'required|exists:cities,id',
            'father'    => 'nullable|exists:people,id',
            'mother'    => 'nullable|exists:people,id',
            'gender'    => 'required|string|min:4|max:6',
            'firstname' => 'required|string|min:2|max:50',
            'nickname'  => 'nullable|string|min:2|max:50',
            'lastname'  => 'required|string|min:2|max:50',
            'national'  => 'nullable|string|size:10',
            'note'      => 'nullable|string'
        ]);

        $person->city = $request->city;
        $person->father = $request->father;
        $person->mother = $request->mother;
        $person->gender = $request->gender;
        $person->firstname = $request->firstname;
        $person->nickname = $request->nickname;
        $person->lastname = $request->lastname;
        $person->national = $request->national;
        $person->note = $request->note;
        $person->save();

        return redirect()->route('panel.people.index');
    }


    public function destroy(Person $person)
    {
        //
    }


    public function tree(Person $person)
    {
        $parents = Person::where('id', $person->father)->orWhere('id', $person->mother)->get();

        $family = $person->family();

        return view('panel.people.tree', compact('person', 'parents', 'family'));
    }
}
