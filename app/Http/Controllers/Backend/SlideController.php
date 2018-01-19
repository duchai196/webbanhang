<?php

namespace App\Http\Controllers\Backend;

use App\Model\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSlide=Slide::orderBy('order','desc')->get();
        return view('admin.slide.list',compact('listSlide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'image'=>'required',
            'type'=>'required',
            'status'=>'required',
            'order'=>'required'
        ]);

        $slide=new Slide();
        $slide->title=$request->title;
        $slide->sub_title=$request->sub_title;
        $slide->descriptions=$request->descriptions;
        $slide->link=$request->link;
        $slide->title_link=$request->title_link;
        $slide->image=$request->image;
        $slide->type=$request->type;
        $slide->status=$request->status;
        $slide->order=$request->order;
        $slide->save();
        return redirect('admin/slide')->with(['level'=>'success','message'=>'Thêm ảnh thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('admin.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
    public function  ajax(Request $request)
    {

        $action=$request->action;
        $id=$request->id;

        if($action=="delete")
        {
            $slide=Slide::findOrFail($id);
            if($slide->delete()){
                return json_encode(true);
            }
            return json_encode(false);
        }
    }
}
