<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $postid = $post->id;
        $auth = Auth::user()->id;
        $data = $request->validate([
            'text' => ['required', 'string', 'max:255'],
        ]);
        Comment::create(array_merge($data,
        ['user_id'=>$auth],
        ['post_id'=>$postid],
        ) );
            return redirect()->route('post_show', ['id'=>$postid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
         $comment = Comment::findOrFail($id);
         $auth = Auth::user()->id;
         if ($comment->user_id == $auth) {
             return view('post.comment.edit', compact('comment'));
         }
     }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
        $comment = Comment::findOrFail($id);
        $auth = Auth::user()->id;
        $data = $request->validate([
            'text' => ['required', 'string', 'max:255'],
        ]);
        if ($comment->user_id == $auth) {
            $comment->update($data);
            return redirect()->route('post_show', ['id'=>$comment->post->id]);
        }else {
            return redirect()->route('post_show', ['id'=>$comment->post->id]);
        }
     }
     public function destroy($id)
     {
        $comment = Comment::findOrFail($id);
        $auth = Auth::user()->id;
        
        if ($comment->user_id == $auth) {
            $comment->delete($id);
            return redirect()->route('post_show', ['id'=>$comment->post->id]);
        }else {
            return redirect()->route('post_show', ['id'=>$comment->post->id]);
        }
     }
}
