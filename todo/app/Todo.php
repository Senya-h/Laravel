<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['subject', 'priorityId', 'dueDate', 'statusId', 'percent', 'userId'];
}
