<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCate=Category::all();
        return view('admin.category.list',compact('listCate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent=Category::all();
        return view('admin.category.add',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
//        dd($request->all());
        $category=new Category();
        $category->parent_id=$request->parent_id;
        $category->name=$request->name;
        $category->category_type=$request->category_type;
        $category->slug=str_slug($category->name);
        $category->save();
        return redirect('admin/category')->with(['level'=>'success','message'=>'Thêm danh mục thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $listCate=Category::all();
        return view('admin.category.edit',compact('category','listCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->slug=str_slug($category->name);
        $category->category_type=$request->category_type;
        $category->save();

        return redirect()->route('category.index')->with(['level'=>'success','message'=>'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function  ajax(Request $request)
    {
        $cateType=$request->cate_type;
        $action=$request->action;
        $id=$request->id;
        if($action=="loadCate"){
            $listCate=DB::table('categories')->where('category_type',$cateType)->get();
            echo "<option value='' >Please choose..</option>";
            foreach ($listCate as $item){
                echo "<option value='".$item->id."'>".$item->name."</option>";
            }
        }
        if($action=="delete")
        {
            $cate=Category::findOrFail($id);
            $listCate=Category::where('parent_id',$id)->count();

            if($listCate==0){
                if($cate->delete()){
                    return json_encode(true);
                }
            }
            return json_encode($listCate);
        }
    }
}
