<?php
namespace Taheri\Todolist\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Taheri\Todolist\Database\Factories\LabelFactory;

class Label extends Model{
 
 use HasFactory;

 protected $table='labels';
 public $timestamps=false;
 protected $fillable=['name','task_id'];


 public function task()
 {
    return $this->belongsTo(Task::class);
 }

protected static function newFactory()
{
    return LabelFactory::new();
}
}

?>