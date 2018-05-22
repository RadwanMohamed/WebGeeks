<?php

namespace App\Http\Controllers;

use App\Team_members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Team_membersRequest;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members =  Team_members::all();
        return View::make('Admin/Team_members/show',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Team_members/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Team_membersRequest $request)
    {
        //`name`, `img`, `job`, `Desc`, `user_id`
        $file = $request['img'];
        $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Website/img/members'),$imageName);
        Team_members::create(
            [
                'name' =>$request['name'],
                'job'=>$request['job'],
                'Desc' =>$request['Desc'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function show(Team_members $team_members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $member = Team_members::find($id);

        if($request->ajax()) {

            return View::make('Admin/Team_members/edit', compact('member'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function update(Team_membersRequest $request, $id)
    {
        $member = Team_members::find($id);
        if($request['img'] != null)
        {
            $img = public_path('Website/img/members/'.$member->img);
            if(file_exists($img))
                unlink($img);
            $file = $request['img'];
            $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/Website/img/members/'),$imageName);
        }else{
            $imageName = $member->img;
        }
        if ( $request->ajax() ) {
            $member->update([
                //`name`, `img`, `job`, `Desc`
                'name' =>$request['name'],
                'job'=>$request['job'],
                'Desc' =>$request['Desc'],
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
     * @param  \App\Team_members  $team_members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $member = Team_members::find($id);
        $img = public_path('Website/img/members/'.$member->img);
        if(file_exists($img))
        {
            unlink($img);

        }

        if ( $request->ajax() ) {
            $member->delete();

            return response(['msg' => 'the member is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the member', 'status' => 'failed']);

    }

}
