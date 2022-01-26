<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($id)
    {
        $post = Post::findOrfail($id)->id;
        $auth = Auth::user()->id;
        $check = Like::where('post_id', $post)->where('user_id',$auth)->first();
        
        if ($check) {
            $check->delete();
            return redirect()->route('post_show', [$post]);
        }else{
            $dislike = Dislike::where('post_id', $post)->where('user_id',$auth)->first();
            if ($dislike) {
                $dislike->delete();
            }
            Like::create([
                'post_id' => $post,
                'user_id' => $auth,
            ]);
            return redirect()->route('post_show', [$post]);
        }
    }
}
