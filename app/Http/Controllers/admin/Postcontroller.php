<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // return $posts;
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'name'  => 'required',
            'title' => 'required',
        ], [
            'name.required'  => 'please enter your name',
            'title.required' => 'title is required',
        ]);
        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('post', $imageName, 'public');

            Post::create([
                'name'  => $request->name,
                'title' => $request->title,
                'image' =>$imageName,
            ]);
            return Redirect()->route('post.index');
        } else{
            Post::create([
                'name'  => $request->name,
                'title' => $request->title,
            ]);
            return Redirect()->route('post.index');


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        // return $post;
        return view('backend.post.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {

        $request->validate([

            'name'  => 'required',
            'title' => 'required',

        ], [
            'name.required'  => 'please enter your name',
            'title.required' => 'title is required',

        ]);
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete('post/' . $post->image);


        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('post', $imageName, 'public');

            $post = Post::find($id)->update([
                'name'  => $request->name,
                'title' => $request->title,
                'image' => $imageName,
            ]);
            return Redirect()->route('post.index')->with('success','post Inserted');

        } else{

            $post = Post::find($id)->update([
                'name'  => $request->name,
                'title' => $request->title,

            ]);
            return Redirect()->route('post.index')->with('success','post Inserted');
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
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete('post/' . $post->image);
        $post->delete();
         return redirect(route('post.index'));

    }
}
