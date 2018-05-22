<?php

namespace App\Http\Controllers;
use App\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Settings;
use App\Categories;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $copyright = Settings::where('name','copyright')->get();
        $social = Settings::where('name','social')->get();
        $articles = Articles::all();
        $cats = Categories::all();
        $settings = Settings::where('name','blog')->get();
        return View::make('blog/index')->with('articles',$articles)
                                       ->with('cats',$cats)
                                       ->with('settings',$settings)
                                       ->with('copyright',$copyright)
                                       ->with('social',$social);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social = Settings::where('name','social')->get();
        $copyright = Settings::where('name','copyright')->get();
        $article = Articles::find($id);
        $cats = Categories::all();

        return View::make('blog/post')->with('article',$article)->with('cats',$cats)->with('social',$social)->with('copyright',$copyright);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
