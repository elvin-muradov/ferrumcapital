<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::paginate(10);
        return view('blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'title' => 'required',
            'desc' => 'required',
        ]);

        if($request->image){
            $imgName = uniqid() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/images/post_images',$imgName);
        }else{
            $imgName = 'default_image.png';
        }

        Blog::insert([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imgName,
            'user_id' => auth()->user()->id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('dashboard.blog.index')->with('success','New post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::find($id);

        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::find($id);
        return view('blog.edit',compact('post'));
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
        $post = Blog::find($id);

        if(!$request->image){
            $imgName = $post->image;
        }
        else{
            $imgName = uniqid().'.'.$request->image->extension();
            $request->file('image')->storeAs('public/images/post_images',$imgName);
        }

        $post->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imgName,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success','Post updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blog::find($id);
        if($post->image != 'default_image.png'){
            Storage::disk('public')->delete('images/post_images/' . $post->image);
        }
        $post->delete();

        return redirect()->back()->with('success','Post deleted!');
    }
}
