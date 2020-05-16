@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mb-4">Ultimos Tweet</h1>
                <user-component></user-component>
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
                {{$entries->links()}}
        </div>
    </div>
</div>
@endsection

