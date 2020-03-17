<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FactoryIdTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationDetail extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quotation_id',   
        'job_description',  
        'job_description_id',
        'quantity',
        'service_per_year',
        'created_by',
        'updated_by',
        'deleted_by',
        'factory_id'
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function quotation()
    {
    	return $this->belongsTo(Quotation::class);
    }
}
