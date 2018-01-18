<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PostRequest;
use App\Model\Category;
use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost=Post::all();
        return view('admin.post.list',compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCate=Category::where('category_type','post')->get();
        return view('admin.post.add',compact('listCate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
//        dd($request->all());
        $post=new Post();
        $post->title=$request->title;
        $post->excerpt=$request->excerpt;
        $post->body=$request->body;
        $post->image=$request->image;
        $post->meta_description=$request->meta_description;
        $post->meta_keywords=$request->meta_keywords;
        $post->status=$request->status;
        $post->featured=$request->featured;
        $post->category_id=$request->category_id;
        $post->author_id=1;
        $post->slug=str_slug($post->title);
        $post->save();

        return redirect()->route('post.index')->with(['level'=>'success','message'=>'Thêm tin tức thành công!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $listCate=Category::all();
        return view('admin.post.edit',compact('post','listCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->title=$request->title;
        $post->excerpt=$request->excerpt;
        $post->body=$request->body;
        $post->image=$request->image;
        $post->meta_description=$request->meta_description;
        $post->meta_keywords=$request->meta_keywords;
        $post->status=$request->status;
        $post->featured=$request->featured;
        $post->category_id=$request->category_id;
        $post->author_id=1;
        $post->slug=str_slug($post->title);
        $post->save();

        return redirect()->route('post.index')->with(['level'=>'success','message'=>'Cập nhật tin tức thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function ajax(Request $request)
    {
        $id=$request->id;
        $action=$request->action;
        if($action=="delete")
        {
            $post=Post::findOrFail($id);
            if($post->delete())
            {
                return json_encode(true);
            }
            return json_encode(false);
        }
    }
}
