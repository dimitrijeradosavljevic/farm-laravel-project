<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class OwnersController extends Controller
{
    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:100'],
            'last_name' => ['required', 'string', 'min:2', 'max:100'],
            'location' => ['required', 'string', 'min:2', 'max:100'],
            'identifier' => ['required', 'numeric'],
        ]);

        $attributes['user_id'] = auth()->id();

        Owner::create($attributes);

        return redirect('/home');
    }


    public function edit(Owner $owner)
    {
        $this->authorize('update', $owner);

        return view('owners.edit', compact('owner'));
    }


    public function update(Request $request, Owner $owner)
    {
        $this->authorize('update', $owner);

        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:100'],
            'last_name' => ['required', 'string', 'min:2', 'max:100'],
            'location' => ['required', 'string', 'min:2', 'max:100'],
            'identifier' => ['required', 'numeric'],
        ]);
        $attributes['user_id'] = auth()->id();

        $owner->update($attributes);

        return redirect()->back();
    }

    public function destroy(Owner $owner)
    {
        $this->authorize('delete', $owner);

        $owner->delete();

        return redirect('/home');
    }

    public function animals(Owner $owner)
    {
        $this->authorize('view', $owner);

        $animals = $owner->animals->load('breed');

        return view('owners.animals', compact('animals'));
    }
}
