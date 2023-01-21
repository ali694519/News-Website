<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = tag::all();
        $news = post::with(['tags'])->get();
        $category = category::with(['posts'])->get();
        return view('home',compact('category','news','tags'));
    }
}
