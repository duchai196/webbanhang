<?php

namespace App\Http\Controllers\Backend;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Requests\UserRequest;
use Hash;   
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser=User::all();
        return view('admin.user.list',compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       
        $user=new User();
        $user->name=$request->name;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->avartar=$request->avartar;
        $user->email=$request->email;
        $user->role=$request->role;

      
            $user->password=bcrypt($request->password);
            $user->save();
            return redirect()->route('user.index')->with(['level'=>'success','message'=>'Thêm người dùng thành công!']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
