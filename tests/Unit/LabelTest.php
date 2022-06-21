<?php
namespace Taheri\Todolist\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Taheri\Todolist\Models\Task;
use Taheri\Todolist\Models\Label;
use Taheri\Todolist\Tests\TestCase;
use Taheri\Todolist\Tests\User;


class LabelTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  function a_label_has_a_title()
  {
    $label=Label::factory()->create(['name'=>'fake label']);
    $this->assertEquals('fake label',$label->name);
  }



}
