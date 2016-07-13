<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailtemplate extends Model
{
     protected $fillable = ['title','event','body','published'];
}
