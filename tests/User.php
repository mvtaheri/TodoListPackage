<?php

namespace Taheri\Todolist\Tests;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Taheri\Todolist\Database\Factories\UserFactory;
use Taheri\Todolist\Traits\HasTask;

class User extends Model implements AuthorizableContract, AuthenticatableContract {
    use HasTask,Authorizable, Authenticatable;

    protected $guarded = [];

    protected $table = 'users';

    protected static function newFactory()
    {
       return UserFactory::new();
     }
}