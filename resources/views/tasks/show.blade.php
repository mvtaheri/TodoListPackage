@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>TODO DETAILS</b>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$task->titel}}</h5>
            <p class="card-text">{{$task->description}}</p>
            @if($task->labels)
              @foreach($task->labels as $label)
                 <p class="card-text">#{{$label->name}}</p>
              @endforeach   
            @endif
            <a href="{{route('task.delete',['task'=>$task->id])}}"><span class="btn btn-danger">Delete</span></a>
        </div>
        <div class="card-body">
            <h3>Add Label To Task</h3>
               <form action="{{route('label.create')}}" method="post" class="mt-4 p-4">
                {!! csrf_field() !!}
                <div class="form-group m-3">
                    <label for="name">Label Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                 <input type="hidden" name="task" value="{{$task->id}}">
                <div class="form-group m-3">
                    <input type="submit" class="btn btn-primary float-end" value="Submit">
                </div>
               </form>
        </div>
    </div>

@endsection