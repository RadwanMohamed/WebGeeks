<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Articles::all();
       return View::make('Admin/Articles/show',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats    = Categories::all();
        return View::make('Admin/Articles/create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $file = $request['img'];
        $imageName =$request->name.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Website/img/articles'),$imageName);
        Articles::create(
            [

                'title' =>$request['title'],
                'img'   =>$imageName,
                'content' =>$request['content'],
                'category_id' =>$request['category_id'],
                'user_id'   =>Auth::user()->id,
            ]);

        return response()->json($request->messages(), 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id )
    {
        $article = Articles::find($id);
        $cats = Categories::all();
        if($request->ajax()) {

            return View::make('Admin/Articles/edit', compact('article','cats'));
        }
        return response(['msg'=>'somethig is error','status'=>'failed']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, $id)
    {
        $article = Articles::find($id);

        if($request['img'] != null)
        {
            $img = public_path('Website/img/articles/'.$article->img);
            if(file_exists($img))
                unlink($img);
            $file = $request['img'];
            $imageName =$request->title.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/Website/img/articles/'),$imageName);
        }else{
            $imageName = $article->img;
            $img = public_path('/Website/img/articles/'.$imageName);
            if(file_exists($img)){
                $imageName = $article->img;
            }else{
                return response(['msg' => 'you must choose image', 'status' => 'failed']);
            }
        }
        if ( $request->ajax() ) {
            $article->update([

                'title' =>$request['title'],
                'img'   =>$imageName,
                'content' =>$request['content'],
                'category_id' =>$request['category_id'],
                'user_id'   =>Auth::user()->id,
            ]);

            return response(['msg' => 'the article is updated successfully', 'status' => 'success']);
        }
        return response(['msg' => $request->messages(), 'status' => 'failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $article = Articles::find($id);

        $img = public_path('Website/img/articles/'.$article->img);
        if(file_exists($img))
        {
            unlink($img);

        }
        if ($request->ajax()) {
            $article->delete();

            return response(['msg' => 'the article is deleted successfully', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the article', 'status' => 'failed']);

    
    }
}
