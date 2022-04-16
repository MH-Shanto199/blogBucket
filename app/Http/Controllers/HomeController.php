<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.landing');
    }

    public function profile()
    {
        $user = auth()->user();

        return view('pages.profile.profile', compact('user'));
    }

    public function editProfile($id) 
    {
        if (!$id) return abort(404);
        $user = User::findOrFail($id);
        return view('pages.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, $user)
    {
        // return $request->all();
        $user = User::findOrFail($user);
        $param = $request->validate([
            'name' => [ 'required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id ],
            'age' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255']
        ]);
        try {
            $res = $user->update($param);
            if (!$res) throw new \Exception('Unable to Update profile');
        } catch (\Throwable $m) {
            return redirect()->back()->withInput()->withErrors($m->getMessage());
        }
        return redirect()->back()->withSuccess(__('Your Profile updated successfully'));
    }
}
