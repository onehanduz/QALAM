<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        $posts = Post::latest()->paginate(20);
        return view('post.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'text'=>'required',
            'image' =>'nullable',
        ]);
        
        if ($request->file('image')) {
            $time = time();
            $name = $request->file('image')->getClientOriginalName();
            $imageName = "$time.$name";

            $request->image->move(public_path('storage/posts'), $imageName);

            $image_path = "/storage/posts/$imageName";
            $auth = Auth::user()->id;
            Post::create([
                'text' => $data['text'],
                'user_id' => $auth,
                'image' => $image_path,
            ]);
        }else{
            $auth = Auth::user()->id;
            Post::create([
                'text' => $data['text'],
                'user_id' => $auth,
            ]);
        }
        return redirect('/p');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth = Auth::user()->id;
        $post = Post::findOrFail($id);
        if ($auth == $post->user_id) {
            return view('post.edit', compact('post'));
        }else{
            return redirect('/p');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'text'=>'required',
            'image' =>'nullable',
        ]);
        $post = Post::findOrFail($id);
        $auth = Auth::user()->id;
        if ($auth == $post->id) {

            if ($request->file('image')) {
                $time = time();
                $name = $request->file('image')->getClientOriginalName();
                $imageName = "$time.$name";
    
                $request->image->move(public_path('storage/posts'), $imageName);
    
                $image_path = "/storage/posts/$imageName";
                
                $post->update([
                    'text' => $data['text'],
                    'user_id' => $auth,
                    'image' => $image_path,
                ]);
            }else{
                $post->update([
                    'text' => $data['text'],
                    'user_id' => $auth,
                ]);
            }
            return redirect("/p/show/$post->id");
        }else{
            return redirect('/p');
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
