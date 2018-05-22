<?php

namespace App\Http\Controllers;

use App\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PricingPlanRequest;

class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans =  PricingPlan::all();
        return View::make('Admin/PricingPlans/show',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/PricingPlans/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricingPlanRequest $request)
    {
        PricingPlan::create(
            [
                //``title`, ``content, `name`, `user_id`

                'type' =>$request['type'],
                'price'=>$request['price'],
                'currency'=>$request['currency'],
                'time'=>$request['time'],
                'properties'=>$request['properties'],
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(PricingPlan $pricingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $plan = PricingPlan::find($id);

        if($request->ajax()) {

            return View::make('Admin/pricingplans/edit', compact('plan'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(PricingPlanRequest $request,  $id)
    {
        $plan = PricingPlan::find($id);

        if ( $request->ajax() ) {
            $plan->update([
                //``title`, ``content, `name`, `user_id`
                //``title`, ``content, `name`, `user_id`

                'type' =>$request['type'],
                'price'=>$request['price'],
                'currency'=>$request['currency'],
                'time'=>$request['time'],
                'properties'=>$request['properties'],
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the plan is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $plan = PricingPlan::find($id);

        if ($request->ajax()) {
            $plan->delete();

            return response(['msg' => 'the plan is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the member', 'status' => 'failed']);

    }
}
