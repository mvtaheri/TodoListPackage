<?php 
namespace Taheri\Todolist\Http\Controllers;

use Taheri\Todolist\Models\Label;
use Taheri\Todolist\Models\Task;
use Illuminate\Database\Eloquent\Builder;
class LabelController extends Controller{

  public function __construct(){
    // $this->middleware('token-check');
  }
  
  // public function index(){
  //     $labels=Label::all();
  //     return response()->json($labels);
  // }

  public function add_label_to_task(){
     
    request()->validate([
       'name'=>'required|unique:labels,name',
       'task'=>'required|exists:tasks,id'
     ]);
     try{
     if(!auth()->check()){
        return abort(403, 'Unauthorized action.');
     }
     $task= Task::find(request('task'));
     $label=$task->labels()->create(['name'=>request('name')]);
     return redirect(route('tasks.show',['task'=>$task]));
    }catch(Exception $exception){
      return response()->json($exception->getMessage())->status(402);
    }
    }

    public function search(){
     request()->validate([
      'search' =>'required|string'
      ]);
     try{
      $tasks=Task::whereHas('labels', function (Builder $query) {
         $query->where('name', 'like', '%'.request('search').'%');
      })->get();
      return view('todolist::tasks.index',['tasks'=>$tasks]);
    }catch(Exception $exception){
      return response()->json($exception->getMessage(),402);
    }
  }

  }
