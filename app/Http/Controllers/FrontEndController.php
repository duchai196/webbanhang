<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;
use App\Model\Product;
use App\Model\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function getIndex()
    {
        $listSlides = Slide::where(['type' => 1, 'status' => 1])->orderBy('order', 'asc')->take(3)->get();
        $featuredProducts = Product::where(['featured' => 1, 'status' => 1])->orderBy('created_at', 'desc')->take(3)->get();
        $listProducts=Product::select('id','category_id','name','price','sale_price','image','slug','status','updated_at')->get();

        return view('frontend.pages.index',compact('listSlides','featuredProducts','listProducts'));
    }
    public  function getShop()
    {
        $listProducts=Product::select('id','category_id','name','price','sale_price','image','slug','status','updated_at')->paginate(12);

        return view('frontend.pages.shop',compact('listProducts'));
    }

    public  function getCategory($id)
    {
        $listProducts=Product::select('id','category_id','name','price','sale_price','image','slug','status','updated_at')->where('category_id',$id)->paginate(12);
        return view('frontend.pages.category',compact('listProducts'));
    }

    public  function  getProduct($slug)
    {
        $product=Product::where('slug',$slug)->first();

        return view('frontend.pages.single-product',compact('product'));

    }
    public  function getBlog()
    {
        $listPost=Post::paginate(5);

        return view('frontend.pages.blog',compact('listPost'));
    }
    public function getPost($slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('frontend.pages.single-post',compact('post'));
    }
    public  function getContact()
    {


        return view('frontend.pages.contact');
    }

    public  function  getLogout()
    {
        Auth::logout();
        return redirect()->route('home');

    }

    public function filterPrice(Request $request)
    {

       $price=$request->price;

//       dd(explode(',',$price));
       if($request->has('price'))
       {
           $listProducts=Product::whereBetween('price',explode(',',$price))->where('status','=',1)->paginate(12);
            return view('frontend.pages.shop',compact('listProducts'));
       }
    }
}

