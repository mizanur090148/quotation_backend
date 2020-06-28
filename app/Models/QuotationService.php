<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Quotation;
use App\Models\Service;

class QuotationService extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
    	'quotation_id',
    	'service_id',
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
        return $this->belongsTo(Quotation::class)->withDefault([
            'vendor_name' => 'N/A'
        ]);
    }

    public function service()
    {
    	return $this->belongsTo(Service::class)->withDefault([
            'name' => 'N/A'
        ]);
    }
}
