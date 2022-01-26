<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $user = User::findOrfail($id)->id;
        $auth = Auth::user()->id;
        $check = Follow::where('user_id', $user)->where('profile_id', $auth)->first();
        
        if ($check) {
            $check->delete();
            return redirect()->route('show', [$user]);
        }else{
            Follow::create([
                'user_id' => $user,
                'profile_id' => $auth,
            ]);
            return redirect()->route('show', [$user]);
        }
    }
}
