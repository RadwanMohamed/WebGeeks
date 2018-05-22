<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\users;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return View::make('Admin/users/show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            return View::make('Admin/users/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(users $request)
    {


       $file = $request['img'];
       $imageName =$request->email.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Admin/users_images'),$imageName);
        User::create(
            [
                'name' =>$request['name'],
                'admin'=>$request['permissions'],
                'email' =>$request['email'],
                'img'   =>$imageName,
                'password' =>bcrypt($request['password'])
            ]);

        return response()->json($request->messages(), 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $user = User::find($id);

        if($request->ajax()) {

            return View::make('Admin/users/edit', compact('user'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(users $request, $id)
    {
        $user = User::find($id);
        if($request['img'] != null)
        {
            $img = public_path('/Admin/users_images/'.$user->img);
            unlink($img);
            $file = $request['img'];
            $imageName =$request->email.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('Admin/users_images'),$imageName);
        }else{
            $imageName = $user->img;
        }
        if ( $request->ajax() ) {
            $user->update([
                'name' =>$request['name'],
                'admin'=>$request['permissions'],
                'email' =>$request['email'],
                'img'   =>$imageName,
            ]);

            return response(['msg' => 'the user is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $user = User::find($id);
        $img = public_path('/Admin/users_images/'.$user->img);
        if(file_exists($img))
        {
            unlink($img);

        }

        if ( $request->ajax() ) {
            $user->delete();

            return response(['msg' => 'the user is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the user', 'status' => 'failed']);

    }

}
