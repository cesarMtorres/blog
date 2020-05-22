<?php

namespace App\Http\Controllers;

use App\Tweet;
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
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return Tweet::where('user_id', auth()->id()->get());

        }  else{
            return view('home');
        }     
    }


    public function store(Request $request)
    {
        $tweet=new Tweet();
        $tweet->title=$request->content;
        $tweet->content=$request->content;
        $tweet->user_id=$request->auth()->id();
        $tweet->save();

        return $tweet;
    }

        public function update(Request $request,$id)
    {
        $tweet=Tweet::find($id);
        $tweet->title=$request->content;
        $tweet->content=$request->content;
        $tweet->user_id=$request->auth()->id();
        $tweet->save();

        return $tweet;
    }
    public function destroy($id)
    {
        $tweet=Tweet::find($id);
        $tweet->delete();
    }
    
}
