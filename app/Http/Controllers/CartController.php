<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Model\Bill;
use App\Model\BillDetail;
use App\Model\Customer;
use App\Model\Product;
use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;


class CartController extends Controller
{
    public function postCart(Request $request)
    {
        $id=$request->id;
        $product=Product::findOrFail($id);
        if($product->sale_price<$product->price && $product->sale_price!=null)
        {
            $price=$product->sale_price;
        }else
        {
            $price=$product->price;
        }
        if(isset($request->quantity))
        {
            $quantity=$request->quantity;
        }
        else
            $quantity=1;
        $cartInfo=[
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>$quantity,
            'price'=>$price,
            'options'=>[
                'images'=>$product->image
            ]
        ];
        Cart::add($cartInfo);
        $cart=Cart::content();

        return view('frontend.pages.cart',compact('cart'));
    }

    /**
     * @param Request $request
     * @param $rowId
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function  update(Request $request, $rowId)
    {
        $qty=$request->quantity;
        Cart::update($rowId,$qty);
        $cart=Cart::content();

        return redirect()->back();
    }
    public  function  remove($rowId)
    {
        Cart::remove($rowId);
        $cart=Cart::content();

        return redirect()->back()->with(['cart'=>$cart]);
    }

    public  function getCheckOut()
    {
        $cart=Cart::content();
        return view('frontend.pages.checkout',compact('cart'));
    }
    public function postCheckout(Request $request)
    {

        $cart=Cart::content();

        $rule = [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|digits_between:10,12'

        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return redirect('/thanh-toan')
                ->withErrors($validator)
                ->withInput();
        }

        $customer= new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone_number=$request->phone;
        $customer->address=$request->address;
        $customer->note=$request->note;
        $customer->save();

        $bill = new Bill();
        $bill->customer_id = $customer->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = str_replace(',', '', Cart::total());
        $bill->note = $request->note;
        $bill->save();
        if (count($cart) >0) {
            foreach ($cart as $key => $item) {
                $billDetail = new BillDetail();
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $item->id;
                $billDetail->quantily = $item->qty;
                $billDetail->price = $item->price;
                $billDetail->save();
            }
        }

        if($request->createAccount=="on")
        {
            $rule2 = [
                'password' => 'required',


            ];
            $validator2 = Validator::make(Input::all(), $rule2);
            if ($validator2->fails()) {
                return redirect('/thanh-toan')
                    ->withErrors($validator2)
                    ->withInput();
            }

            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->avartar=null;
            $user->role=0;
            $user->remember_token=null;
            $user->password=bcrypt($request->password);
            $user->save();
        }
        Cart::destroy();

        return redirect()->back()->with('message','Bạn đã đặt hàng thành công!');


    }
    public function ajax(Request $request)
    {

    }
}
