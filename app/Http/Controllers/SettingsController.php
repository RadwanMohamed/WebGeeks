<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\SettingsRequest;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings =  Settings::all();
        return View::make('Admin/settings/show',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/settings/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingsRequest $request)
    {
        Settings::create([
            'name' =>$request['name'],
            'desc' =>$request['desc'],
            'content' =>$request['content'],
            'user_id'   =>Auth::user()->id,
        ]);
        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $setting = Settings::find($id);

        if($request->ajax()) {

            return View::make('Admin/settings/edit', compact('setting'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsRequest $request,  $id)
    {
        $setting = Settings::find($id);
        if ( $request->ajax() ) {
            $setting->update([
                'name' =>$request['name'],
                'desc' =>$request['desc'],
                'content' =>$request['content'],
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the setting is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $setting = Settings::find($id);

        if ( $request->ajax() ) {
            $setting->delete();

            return response(['msg' => 'the setting is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the setting', 'status' => 'failed']);

    }
}
