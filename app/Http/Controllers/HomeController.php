<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function edit()
    {
        $data['user'] = Auth::user();
        return view('users.edit', $data);
    }

    public function update()
    {
        $user = Auth::user();
        $user->update(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'city' =>['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]));
        return view('users.edit', compact('user'))->with('success', 'Saved succesfully');
    }

    public function adverts() {
        $data['adverts'] = Auth::user()->adverts()->get();
        return view('adverts.showyour', $data);
    }
}
