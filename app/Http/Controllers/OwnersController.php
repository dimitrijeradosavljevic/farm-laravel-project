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
        $this->authorize('modify', $owner);


        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $this->authorize('modify', $owner);

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
        $this->authorize('modify', $owner);

        $owner->delete();

        return redirect('/home');
    }
}
