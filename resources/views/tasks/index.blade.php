@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item"><a href="details" style="color: cornflowerblue">{{$todo->titel}}</a></li>
                     <li class="list-group-item"><a href="details" style="color: cornflowerblue">{{$todo->description}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection