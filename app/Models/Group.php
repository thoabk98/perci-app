<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  //use SoftDeletes;
  protected $table = 'groups';

  protected $fillable = ['user_id', 'name', 'status', 'start_date', 'end_date'];
}
