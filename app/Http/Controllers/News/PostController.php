<?php

namespace App\Http\Controllers\News;

use App\Models\tag;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tag::all();
        $news = post::with(['tags'])->get();
        $category = category::with(['posts'])->get();
        return view('News.news',compact('category','news','tags'));

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
    public function store(StorePostRequest $request)
    {
        //Insert The News In Database
        $news = new post();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->category_id = $request->category;
        $news->save();

        //To insert all of the tags selected...
        $news->tags()->attach($request->tag_id);
        session()->flash('Add','The news has been added successfully');
        return redirect('/News');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request)
    {
         try{
        //Update The News
        $news = post::findOrFail($request->id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->category_id = $request->category_id;

           // update pivot table
        if (isset($request->tag_id)) {
            $news->tags()->sync($request->tag_id);
        }
        else {
            $news->tags()->sync(array());
        }
        $news->save();
        session()->flash('edit','The News has been added successfully');
        return redirect('/News');
         }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Delete The News
        $id = $request->id;
        post::findOrFail($id)->delete();
        session()->flash('delete','The News has been successfully deleted');
        return redirect('/News');
    }

    // Search In multi models....News|Tags|Category
    public function Filter_Classes(Request $request)
    {
        $results = Search::addMany([
            [post::class,['title','content','created_at']],
            [category::class,'cate_name'],
            [tag::class,'tag_name']
        ])->beginWithWildcard()->paginate()->get($request->get('search'));

        return view('Search.search',compact('results'));

    }

}
