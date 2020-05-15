<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function create(){
    	return view("entries.create");
    }

    public function store(Request $request)
    {
    	$validateData=$request->validate([
    		'title' => 'required|min:7|max:255|unique:entries',
    		'content' => 'required|min:20|max:1000'
    	]);	

    	$entrada= new Entry();
    	$entrada->title=$validateData["title"];
    	$entrada->content=$validateData["content"];
    	$entrada->user_id=auth()->id();
    	$entrada->save();
    	$status="Nuestra entrada a sido Creada Correctamente";
    	return back()->with(compact('status'));
    }

    public function edit(Entry $entry)
    {
    
         $this->authorize('update',$entry);

        return view('entries.edit',compact('entry'));
    }

        public function update(Request $request, Entry $entry)
    {
        $this->authorize('update',$entry);
        
        $validateData=$request->validate([
            'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:20|max:1000'
        ]); 

        $entry->title=$validateData["title"];
        $entry->content=$validateData["content"];
        $entry->save();
        $status="Tu entrada a sido Modificada Correctamente";
        return back()->with(compact('status'));
    }
}
