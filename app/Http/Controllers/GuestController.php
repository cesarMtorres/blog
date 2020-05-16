<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class GuestController extends Controller
{
    //
    public function index(){
    
$entries=Tweet::with('user')
    	->orderByDesc('created_at')
    	->orderByDesc('id')
    	->paginate(10);
    	return view('welcome',compact('entries'));

 /*           return response()->json([
            'entries' => \App\Tweet::with('user')
        ->orderByDesc('created_at')
        ->orderByDesc('id')
        ->paginate(10)
        ], Response::HTTP_OK);

        */
    }

    public function show(Tweet $entryBySlug)
    {
    	return view('entries.show',[
            'entry' => $entryBySlug
        ]);
    }
}
