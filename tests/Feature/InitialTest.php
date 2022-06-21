<?php 
namespace Taheri\Todolist\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Taheri\Todolist\Models\Task;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Taheri\Todolist\Tests\TestCase;

class InitialTest extends TestCase{

  use RefreshDatabase,InteractsWithViews;


/** @test */
 public function create_task(){
 	Task::create([
     'title'   => 'yoso',
     'description'=> ' this is ber suh',
     'status' =>true
 	]);
 	$this->assertCount(1,Task::all());
 }
}