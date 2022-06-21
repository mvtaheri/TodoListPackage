<?php
namespace Taheri\Todolist\Tests;

use Taheri\Todolist\Tests\TestCase;
use Taheri\Todolist\Models\Label;
use Taheri\Todolist\Models\Task;
use Taheri\Todolist\Tests\User;
use Illuminate\Testing\Fluent\AssertableJson;

class CreateLabelTest extends TestCase{
 protected $task;
 protected $author;

/**  @test */
public function create_label_test(){
   $this->create();
   $res=$this->post(route('label.create'),['name'=>'label','task'=>
                    $this->task->id]);
   $res->assertStatus(200);
   $label=$this->task->labels()->first();
   $this->assertEquals('label',$label->name);
}

/** @test */
public function search_task_with_label(){
    $this->create();
    $this->post(route('label.create'),['name'=>'label','task'=>
                    $this->task->id]);
    $response=$this->post(route('label.search',['search'=>'labe']));
   $response->assertJsonStructure([
    'tasks' => [
        '*' => [
             'title',
             'description',
             'status'
        ]
    ]
]);
   $response->assertStatus(200);
}

protected function create(){
   $this->author = User::create([
            'name' => 'mohammad',
            'email' => 'taheri',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'token' => \Illuminate\Support\Str::random(20),
            'remember_token' => \Illuminate\Support\Str::random(10),
    ]);
   $this->task=$this->author->tasks()->create([
            'title'=>'title',
            'description'=>'description',
            'status'=>true
   ]);
}
}