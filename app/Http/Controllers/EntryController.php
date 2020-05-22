<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(){
        return  Tweet::with('user')
        ->where('user_id', auth()->id())->get();
    }

    public function create(){
    	return view("entries.create");
    }

    public function store(Request $request)
    {
    	$validateData=$request->validate([
    		'content' => 'required|min:20|max:1000'
    	]);	

      //  $parts=explode(' ',$validateData["content"]);
       // $title=reset($parts);
    	$entrada= new Tweet();
    	$entrada->content=$validateData["content"];
        $entrada->title=$validateData["content"];
    	$entrada->user_id=auth()->id();
    	$entrada->save();
    	$status="Nuestra entrada a sido Creada Correctamente";
    	return back()->with(compact('status'));
    }

    public function edit(Tweet $entry)
    {
    
         $this->authorize('update',$entry);

        return view('entries.edit',compact('entry'));
    }

        public function update(Request $request, Tweet $entry)
    {
        $this->authorize('update',$entry);
        
        $validateData=$request->validate([
            'content' => 'required|min:20|max:1000',
        ]); 

    
        $entry->content=$validateData["content"];
        $entry->save();
        $status="Tu entrada a sido Modificada Correctamente";
        return back()->with(compact('status'));
    }

    public function delete($id)
    {
        $this->authorize('delete', $id);
        Tweet::find($id)->delete();
        
    }

    }
