<?php

namespace App\Http\Controllers\Backend;

use App\Model\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBrand=Brand::all();
        return view('admin.brand.list',compact('listBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');

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
                'name'=>'required',
                'logo'=>'required'
            ]
            ,[
                'name.required'=>'Bạn chưa nhập tên',
                'logo.required'=>'Bạn chưa chọn logo'
            ]);

        $brand=new Brand();
        $brand->name=$request->name;
        $brand->logo=$request->logo;
        $brand->save();
        return redirect()->route('brand.index')->with(['level'=>'success','message'=>'Thêm nhãn hiệu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,[
                'name'=>'required',
                'logo'=>'required'
            ]
            ,[
                'name.required'=>'Bạn chưa nhập tên',
                'logo.required'=>'Bạn chưa chọn logo'
            ]);

        $brand->name=$request->name;
        $brand->logo=$request->logo;
        $brand->save();
        return redirect()->route('brand.index')->with(['level'=>'success','message'=>'Cập nhật nhãn hiệu thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
    public function  ajax(Request $request)
    {

        $action=$request->action;
        $id=$request->id;

        if($action=="delete")
        {
            $brand=Brand::findOrFail($id);
            if($brand->delete()){
                return json_encode(true);
            }
            return json_encode(false);
        }
    }
}
