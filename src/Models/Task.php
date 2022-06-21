<?php

namespace Taheri\Todolist\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Taheri\Todolist\Models\Label;

class Task extends Model{
 use HasFactory;

 protected $table='tasks';
 protected $fillable=['title','description','status'];

public function labels()
{
  return $this->hasMany(Label::class);
}
}

?>