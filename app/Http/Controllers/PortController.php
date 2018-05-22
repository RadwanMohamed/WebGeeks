<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PortRequest;



class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ports =  Port::all();
        return View::make('Admin/Port/show',compact('ports'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Port/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortRequest $request)
    {
        //'name','category', 'content', 'desc','img','user_id'
        $file = $request['img'];
        $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Website/img/port'),$imageName);
        Port::create(
            [
                'name' =>$request['name'],
                'category'=>$request['category'],
                'content' =>$request['content'],
                'desc' =>$request['desc'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function show(Port $port)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $port = Port::find($id);

        if($request->ajax()) {

            return View::make('Admin/port/edit', compact('port'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function update(PortRequest $request,$id)
    {
        $port = Port::find($id);
        if($request['img'] != null)
        {
            $img = public_path('Website/img/port/'.$port->img);
            if(file_exists($img))
                unlink($img);
            $file = $request['img'];
            $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/Website/img/port/'),$imageName);
        }else{
            $imageName = $port->img;
        }
        if ( $request->ajax() ) {
            $port->update([
                'name' =>$request['name'],
                'category'=>$request['category'],
                'content' =>$request['content'],
                'desc' =>$request['desc'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the project is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Port  $port
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $port = Port::find($id);
        $img = public_path('Website/img/port/'.$port->img);
        if(file_exists($img))
        {
            unlink($img);

        }

        if ( $request->ajax() ) {
            $port->delete();

            return response(['msg' => 'the project is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the project', 'status' => 'failed']);

    }


}
