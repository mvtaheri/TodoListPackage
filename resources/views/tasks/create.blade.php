@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

    <form action="{{route('tasks.store')}}" method="post" class="mt-4 p-4">
         {!! csrf_field() !!}
        <div class="form-group m-3">
            <label for="name">Todo title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>

@endsection