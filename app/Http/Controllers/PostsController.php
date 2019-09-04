<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts=Post::orderBy('created_at','desc')->paginate(4);
  //$posts= Post::all();
        return view ('post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable'


        ]);


        //HANDLE FILE UPLOADS


        if($request->hasFile('cover_image'))
        {
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();

            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension=$request->file('cover_image')->getClientOriginalExtension();

            //FILENAME TO STORE
            $filenameToStore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);

        
        }

        else
        {
            $filenameToStore='noimage.jpg';
        }


        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id; 
        $post->cover_image=$filenameToStore;
        
               $post->save();

        return redirect('/posts')->with('success','Post Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

     $post=Post::find($id);
     return view('post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
     $post=Post::find($id);
     if(auth()->user()->id!=$post->user_id)
     return redirect('/posts')->with('error','Unauthorized Access');
        
     return view('post.edit')->with('post',$post);
    
        //
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
        $this->validate($request,[

            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable'

        ]);

        if($request->hasFile('cover_image'))
        {
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();

            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension=$request->file('cover_image')->getClientOriginalExtension();

            //FILENAME TO STORE
            $filenameToStore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);

        
        }

       


        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image'))
          $post->cover_image= $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success','Post Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if($post->cover_image!='nomimage.jpg')
        {
           Storage::delete('public/cover_images/'.$post->cover_image);
        }


        if(auth()->user()->id!=$post->user_id)
     return redirect('/posts')->with('error','Unauthorized Access');
        $post->delete();

        return redirect('/posts')->with('success','Post Deleted Successfully !');
    
    }
}
