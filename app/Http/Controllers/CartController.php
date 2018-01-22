<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Cart;


class CartController extends Controller
{
    public  function  cart($id)
    {
        $product=Product::findOrFail($id);
        if($product->sale_price<$product->price && $product->sale_price!=null)
        {
            $price=$product->sale_price;
        }else
        {
            $price=$product->price;
        }
        $cartInfo=[
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$price,
            'options'=>[
                'images'=>$product->image
            ]
        ];
        Cart::add($cartInfo);
        $cart=Cart::content();

        return view('frontend.pages.cart',compact('cart'));
    }
    public function postCart(Request $request,$id)
    {
        $product=Product::findOrFail($id);
        if($product->sale_price<$product->price && $product->sale_price!=null)
        {
            $price=$product->sale_price;
        }else
        {
            $price=$product->price;
        }
        $cartInfo=[
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>$request->quantity,
            'price'=>$price,
            'options'=>[
                'images'=>$product->image
            ]
        ];
        Cart::add($cartInfo);
        $cart=Cart::content();

        return view('frontend.pages.cart',compact('cart'));
    }
    public  function  update($rowId,Request $request)
    {
        $qty=$request->quantity;
        Cart::update($rowId,$qty);
        $cart=Cart::content();

        return view('frontend.pages.cart',compact('cart'));
    }
     public  function  remove($rowId)
     {
         Cart::remove($rowId);
         $cart=Cart::content();

         return view('frontend.pages.cart',compact('cart'));
     }
}
