<?php

namespace App\Http\Controllers\Backend;

use App\ImgProduct;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProduct=Product::all();
        return view('admin.product.list',compact('listProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCate=Category::where('category_type','product')->get();
        $listBrand=Brand::all();
        return view('admin.product.add',compact('listCate','listBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $product=new Product();
        $product->name=$request->name;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->price=$request->price;
        $product->sale_price=$request->sale_price;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->image=$request->image;
        $product->status=$request->status;
        $product->featured=$request->featured;
        $product->meta_description=$request->meta_description;
        $product->meta_keywords=$request->meta_keywords;
        $product->slug=str_slug($product->name);


        $product->save();
        $id=$product->id;
        if($request->imageDetail!=null)
        {
            $imgDetails=$request->imageDetail;
            foreach ($imgDetails as $imgDetail)
            {
                $imgProduct = new ImgProduct();
                if(isset($imgDetail)) {
                    $imgProduct->product_id = $id;
                    $imgProduct->image = $imgDetail;
                    $imgProduct->save();
                }
            }
        }
        return redirect()->route('product.index')->with(['level'=>'success','message'=>'Thêm sản phẩm thành công!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $listCate=Category::all();
        $listBrand=Brand::all();

        $imgDetails=ImgProduct::where('product_id',$product->id)->get();
        return view('admin.product.edit',compact('listCate','product','listBrand','imgDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

        $product->name=$request->name;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->price=$request->price;
        $product->sale_price=$request->sale_price;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->image=$request->image;
        $product->status=$request->status;
        $product->featured=$request->featured;
        $product->meta_description=$request->meta_description;
        $product->meta_keywords=$request->meta_keywords;
        $product->slug=str_slug($product->name);
        $product->save();
        $id=$product->id;
        if($request->imageDetail)
        {
            $imgDetails=$request->imageDetail;
            foreach ($imgDetails as $imgDetail)
            {
                $imgProduct = new ImgProduct();
                if(isset($imgDetail)) {
                    $imgProduct->product_id = $id;
                    $imgProduct->image = $imgDetail;
                    $imgProduct->save();
                }
            }
        }

        return redirect()->route('product.index')->with(['level'=>'success','message'=>'Cập nhật sản phẩm thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function ajax(Request $request)
    {
        $id=$request->id;
        $action=$request->action;
        if($action=="delete")
        {
            $product=Product::find($id);
            if($product->delete()){
                $imgDetails=ImgProduct::where('product_id',$id)->delete();
                return json_encode(true);
            }
            return json_encode(false);
        }
    }
}
