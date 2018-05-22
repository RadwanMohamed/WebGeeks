<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ClientsRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  Clients::all();
        return View::make('Admin/Clients/show',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Clients/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        $file = $request['img'];
        $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Website/img/clients'),$imageName);
        Clients::create(
            [

                'name' =>$request['name'],
                'link' =>$request['link'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $client = Clients::find($id);

        if($request->ajax()) {

            return View::make('Admin/Clients/edit', compact('client'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request,  $id)
    {
        $client = Clients::find($id);

       if($request['img'] != null)
        {
            $img = public_path('Website/img/clients/'.$client->img);
            if(file_exists($img))
                unlink($img);
            $file = $request['img'];
            $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/Website/img/clients/'),$imageName);
        }else{
            $imageName = $client->img;
            $img = public_path('/Website/img/clients/'.$imageName);
            if(file_exists($img)){
                $imageName = $client->img;
            }else{
                return response(['msg' => 'you must choose image', 'status' => 'failed']);
            }
        }
        if ( $request->ajax() ) {
            $client->update([


                'name' =>$request['name'],
                'link' =>$request['link'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the client is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $client = Clients::find($id);

        $img = public_path('Website/img/clients/'.$client->img);
        if(file_exists($img))
        {
            unlink($img);

        }
        if ($request->ajax()) {
            $client->delete();

            return response(['msg' => 'the client is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the member', 'status' => 'failed']);

    }
}
