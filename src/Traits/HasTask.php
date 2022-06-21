<?php
namespace Taheri\Todolist\Traits;

use Taheri\Todolist\Models\Task;
use Illuminate\Support\Facades\Crypt;
trait HasTask{

    public function tasks(){

 	  return $this->morphMany(Task::class,'author');
  }
}