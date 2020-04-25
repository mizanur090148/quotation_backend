<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FactoryIdTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Quotation extends Model
{
    use SoftDeletes, CascadeSoftDeletes, FactoryIdTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id',   
        'quotation_no',  
        'quotation_date',
        'subject',
        'total_discount',
        'total_without_discount',        
        'created_by',
        'updated_by',
        'deleted_by',
        'factory_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $cascadeDeletes = [
        'quotation_details'
    ];

    public function vendor()
    {
    	return $this->belongsTo(Vendor::class)->withDefault([
            'vendor_name' => 'N/A'
        ]);
    }

    public function quotation_details()
    {
        return $this->hasMany(QuotationDetail::class, 'quotation_id');
    }    

    public function getQuotationTotalAttribute()
    {
        return $this->quotation_details()->sum('service_per_year');
    }
}
