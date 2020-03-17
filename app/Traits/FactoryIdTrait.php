<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Auth, Session;

trait FactoryIdTrait
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('factoryId', function (Builder $builder) {
            
        });

        static::creating(function ($model) {
            $model->factory_id = Auth::user()->factory_id ?? null;
            if (in_array('created_by', $model->getFillable())) {
                $model->created_by = Auth::id();
            }
        });

        static::saving(function ($model) {
            $model->factory_id = Auth::user()->factory_id ?? null;
            if (in_array('created_by', $model->getFillable())) {
                $model->created_by = Auth::id();
            }
        });

        static::deleting(function ($model) {
            /*if (in_array('deleted_by', $model->getFillable())) {
                DB::table($model->table)->where('id', $model->id)
                    ->update([
                        'deleted_by' => userId()
                    ]);
            }*/
        });

        static::updating(function ($model) {
            /*if (in_array('updated_by', $model->getFillable())) {
                DB::table($model->table)->where('id', $model->id)->update([
                    'updated_by' => userId(),
                ]);
            }*/
        });
    }
}
