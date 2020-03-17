<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FactoryIdTrait;

class Vendor extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_name',   
        'vendor_no',  
        'trn_no',
        'address',
        'telephone_no',
        'fax_no',
        'email',
        'attention',
        'attention_designation',
        'mobile_no',
        'created_by',
        'updated_by',
        'deleted_by',        
        'factory_id'
    ];
}
