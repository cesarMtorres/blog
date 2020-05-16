@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tendencias</div>

                <div class="card-body">
                  Api twitter

                </div>
            </div>
        </div>
        <div class="col-md-8">
                   <h3 class="mb-4">Otros Tweet</h3>
            <div class="card">
                  
                @foreach($entries as $entry)
    
                <div class="card-header">
                    <a href="{{url('@'.$entry->user->username)}}">
                    {{$entry->user->name}} {{'@'.$entry->user->username}}
                    </a>
                </div>

                <div class="card-body">
                    <p>{{$entry->content}}</p>
                </div>

                <hr>
                    
                @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection