<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ServicesRequest;
use Symfony\Component\EventDispatcher\Tests\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =  Services::all();
        return View::make('Admin/Services/show',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Services/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesRequest $request)
    {
        Services::create(
            [
                'name' =>$request['name'],
                'logo' =>$request['logo'],
                'Desc'=>$request['Desc'],
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  es
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  es
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $service = Services::find($id);

        if($request->ajax()) {

            return View::make('Admin/Services/edit', compact('service'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  es
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesRequest $request,$id)
    {
        $service = Services::find($id);

        if ( $request->ajax() ) {
            $service->update([
                //`name`, `img`, `job`, `Desc`
                'name' =>$request['name'],
                'logo' =>$request['logo'],
                'Desc'=>$request['Desc'],
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the project is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  es
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $service = Services::find($id);

        if ($request->ajax()) {
            $service->delete();

            return response(['msg' => 'the service is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the member', 'status' => 'failed']);

    }

    
}
