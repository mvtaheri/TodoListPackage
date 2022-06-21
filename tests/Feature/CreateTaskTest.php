<?php 

namespace Taheri\Todolist\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Taheri\Todolist\Models\Task;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Taheri\Todolist\Tests\TestCase;
use Taheri\Todolist\Tests\User;

class CreateTaskTest extends TestCase{

  use RefreshDatabase,InteractsWithViews;

  protected $task,$author;

 /** @test */
 public function authenticated_user_can_create_task(){
     $response=$this->post(route('tasks.store'));
     $response->assertStatus(403);
 }
 /** @test */
 public function show_all_tasks(){
  $response = $this->get(route('tasks.index'));
  $response->assertSee('description');
 }


 /** @test */
 public function validate_task_store_params_test(){
    $author = User::create([
            'name' => 'mohammad',
            'email' => 'taheri',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'token'=>\Illuminate\Support\Str::random(10),
            'remember_token' => \Illuminate\Support\Str::random(10),
    ]);

     $author=User::first();
     $response=$this->actingAs($author)->post(route('tasks.store'));
     $response->assertStatus(302);
 }

  /** @test */
  public function authenticated_user_can_store_task()
  {
    $author = User::create([
            'name' => 'mohammad',
            'email' => 'taheri',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'token' => \Illuminate\Support\Str::random(20),
            'remember_token' => \Illuminate\Support\Str::random(10),
    ]);

    $response= $this->actingAs($author)->post(route('tasks.store'),[
     'token'=>$author->token ,  
     'title'=>'My first fake title',
     'description'=>'My first fake body'
   ]);
    $task=Task::first();
    $response->assertRedirect(route('tasks.show', $task));
   // $this->assertCount(1, Task::all());

   // tap(Task::first(), function ($task) use ($response, $author) {
   //          $this->assertEquals('My first fake title', $task->title);
   //          $this->assertEquals('My first fake body', $task->description);
   //          $this->assertTrue($task->author->is($author));
   //          $response->assertRedirect(route('tasks.show', $task));
   //      });
  }


 /** @test */
  public function test_show_tasks(){
    $this->create();
    $response=$this->actingAs($this->author)->get(route('tasks.show'),$this->task);
    $response->assertSee('description');
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