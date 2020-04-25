<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsAndCondition extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
    	'name',
    	'created_by',
        'updated_by',
        'deleted_by',
        'factory_id'
    ];

    protected $dates = [
    	'deleted_at'
    ];
}
