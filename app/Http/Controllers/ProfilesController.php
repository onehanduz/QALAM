<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('home', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('edit', compact('user')); 
    }

    public function change()
    {
        return view('auth.passwords.change'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $auth = Auth::user();
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:64', 'unique:users'],
            'born' => ['required'],
            'image'=> ['required'],
        ]);
        $time = time();
        $ex = $request->file('image')->getClientOriginalExtension();
        $imageName = "$time-$auth->id.$ex";
        $request->image->move(public_path('images'), $imageName);
        $image_path = "images/$imageName";
        $user = User::find($auth->id);
        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'born' => $data['born'],
            'image' => $image_path,
        ]);
        return redirect('/profile');
    }

    public function changepassword(Request $request)
    {
        $auth = Auth::user();
        $data = $request->validate( [
            'old_password' => 'required',
            'password' => 'required|confirmed|different:old_password',
        ]);
        $user = User::find($auth->id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
