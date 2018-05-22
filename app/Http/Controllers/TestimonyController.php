<?php

namespace App\Http\Controllers;

use App\testimony;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonyRequest;
class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $testimonies =  testimony::all();
        return View::make('Admin/testimonies/show',compact('testimonies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Testimonies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonyRequest $request)
    {
        testimony::create(
            [
                //``title`, ``content, `name`, `user_id`

                'title' =>$request['title'],
                'content'=>$request['content'],
                'name'=>$request['name'],
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $testimony = testimony::find($id);

        if($request->ajax()) {

            return View::make('Admin/Testimonies/edit', compact('testimony'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonyRequest $request, $id)
    {
        $testimony = testimony::find($id);

        if ( $request->ajax() ) {
            $testimony->update([
                //``title`, ``content, `name`, `user_id`
                //``title`, ``content, `name`, `user_id`

                'title' =>$request['title'],
                'content'=>$request['content'],
                'name' =>$request['name'],
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the testimony is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $testimony = testimony::find($id);

        if ($request->ajax()) {
            $testimony->delete();

            return response(['msg' => 'the testimony is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the member', 'status' => 'failed']);
    }
}
