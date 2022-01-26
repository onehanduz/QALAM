<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;    
class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $auth = Auth::user()->id;
        $check = Follow::where('user_id', $user->id)->where('profile_id', $auth)->first();
        return view('profile.show', compact('user', 'check'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change()
    {
        return view('auth.passwords.change'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $auth = Auth::user()->id;
        $user = User::findOrFail($auth);
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:64', 'unique:users'],
            'born' => 'required',
            'image'=> 'required',
        ]);

        $time = time();
        $extension = $request->file('image')->getClientOriginalExtension();
        $imageName = "$auth-$time.$extension";

        $request->image->move(public_path('storage/images'), $imageName);

        $image_path = "/storage/images/$imageName";

        $user->update(array_merge(
            $data,
            ['image' => $image_path],
        ));
        return redirect('/profile');
    }

    public function change_password(Request $request)
    {
        $auth = Auth::user()->id;
        $user = User::findOrFail($auth);
        $data = $request->validate( [
            'old_password' => 'required',
            'password' => 'required|confirmed|different:old_password',
        ]);

        if (Hash::check($data['old_password'], $user->password)) { 
           $user->update([
            'password' => Hash::make($data['password'])
           ]);
            return redirect('/profile');
        
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->route('change');
        }
    }



  }