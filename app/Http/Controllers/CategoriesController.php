<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats =  Categories::all();
        return View::make('Admin/Categories/show',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Admin/Categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $file = $request['img'];
        $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Website/img/categories'),$imageName);
        Categories::create(
            [

                'name' =>$request['name'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $cat = Categories::find($id);

        if($request->ajax()) {

            return View::make('Admin/Categories/edit', compact('cat'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request,  $id)
    {
        $cat = Categories::find($id);

        if($request['img'] != null)
        {
            $img = public_path('Website/img/categories/'.$cat->img);
            if(file_exists($img))
                unlink($img);
            $file = $request['img'];
            $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/Website/img/categories/'),$imageName);
        }else{
            $imageName = $cat->img;
            $img = public_path('/Website/img/categories/'.$imageName);
            if(file_exists($img)){
                $imageName = $cat->img;
            }else{
                return response(['msg' => 'you must choose image', 'status' => 'failed']);
            }
        }
        if ( $request->ajax() ) {
            $cat->update([


                'name' =>$request['name'],
                'img'   =>$imageName,
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the category is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cat = Categories::find($id);

        $img = public_path('Website/img/categories/'.$cat->img);
        if(file_exists($img))
        {
            unlink($img);

        }
        if ($request->ajax()) {
            $cat->delete();

            return response(['msg' => 'the category is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the category', 'status' => 'failed']);

    }
}
