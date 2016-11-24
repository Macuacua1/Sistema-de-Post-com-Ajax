<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mais_vistos=Post::orderBy('total_visualizacao','desc')->take(3)->get();
        $ultimos=Post::orderBy('created_at','desc')->paginate(3);

        return view('home')->with('mais_vistos',$mais_vistos)->with('ultimos',$ultimos);
    }
}
