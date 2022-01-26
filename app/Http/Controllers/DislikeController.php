<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DislikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $post = Post::findOrfail($id)->id;
        $auth = Auth::user()->id;
        $check = Dislike::where('post_id', $post)->where('user_id',$auth)->first();
        
        if ($check) {
            $check->delete();
            return redirect()->route('post_show', [$post]);
        }else{
            $like = Like::where('post_id', $post)->where('user_id',$auth)->first();
            if ($like) {
                $like->delete();
            }
            Dislike::create([
                'post_id' => $post,
                'user_id' => $auth,
            ]);
            return redirect()->route('post_show', [$post]);
        }
    }
}
