<?php

namespace Krenova;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table 	= 'submissions';
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'village', 'districts', 'product', 'spec', 'benefit', 'full_story', 'publish_date'];
}
