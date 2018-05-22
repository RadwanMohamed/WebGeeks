<?php

namespace App\Http\Controllers;

use App\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\SkillsRequest;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills =  Skills::all();
        return View::make('Admin/Skills/show',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Skills/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillsRequest $request)
    {

        Skills::create(
            [
                'name' =>$request['name'],
                'value'=>$request['value'],
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $skill = Skills::find($id);

        if($request->ajax()) {

            return View::make('Admin/Skills/edit', compact('skill'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(SkillsRequest $request,$id)
    {
        $skill = Skills::find($id);

        if ( $request->ajax() ) {
            $skill->update([
                //`name`, `img`, `job`, `Desc`
                'name' =>$request['name'],
                'value'=>$request['value'],
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the project is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $skill = Skills::find($id);

        if ( $request->ajax() ) {
            $skill->delete();

            return response(['msg' => 'the skill is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the member', 'status' => 'failed']);

    }

}
