<?php

namespace Taheri\Todolist\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Taheri\Todolist\Models\Task;
use Taheri\Todolist\Tests\TestCase;


class TaskTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  function a_task_has_a_title()
  {
    $task = Task::factory()->create(['title' => 'Fake Title','description'=>'dfsf']);
    $this->assertEquals('Fake Title', $task->title);
  }

  /** @test */
  function a_task_has_a_description()
  {
    $task = Task::factory()->create(['description' => 'Fake Body']);
    $this->assertEquals('Fake Body', $task->description);
  }

  /** @test */
  function a_task_has_status()
  {
    $task = Task::factory()->create(); // we choose an 
    $this->assertEquals(true, $task->status);
  }
}
