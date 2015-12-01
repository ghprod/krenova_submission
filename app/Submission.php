<?php

namespace Krenova;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table 	= 'submissions';
    protected $fillable = [
    	'user_id', 
    	'name', 
    	'phone', 
    	'address', 
    	'product', 
    	'inspirator', 
    	'problem', 
    	'since', 
    	'applied_at', 
    	'benefit', 
    	'obstacles', 
    	'support_expectations', 
    	'image', 
    	'imae_url', 
    	'video', 
    	'video_url', 
    	'publish_date'
    ];
}
