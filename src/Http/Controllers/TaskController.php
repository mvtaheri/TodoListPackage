<?php

namespace Taheri\Todolist\Http\Controllers;
use Taheri\Todolist\Models\Task;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('token-check');
    }
    public function index()
    {
        $tasks =Task::all();

        return view('todolist::tasks.index',compact($tasks));
    }
    public function create(){
        return view('todolist::task.create');
    }
    public function delete(){
        $task = Task::findOrFail(request('task'));
        $task->labels()->delete();
        $task->delete();
        return response()->json('success');
    }
    public function show()
    {
        $task = Task::orHas('labels')->findOrFail(request('task'));
        dd($task);
        return view('todolist::tasks.show',compact($task));
    }

    public function store()
    {
        if (! auth()->check()) {
            abort (403, 'Only authenticated users can create new task.');
        }

        request()->validate([
            'title' => 'required',
            'description'  => 'required'
        ]);
        $author = auth()->user();
        $task = $author->tasks()->create([
            'title'     => request('title'),
            'description'      => request('description'),
            'status'=>false
        ]);
        
        return redirect(route('tasks.show',$task));
    }

}