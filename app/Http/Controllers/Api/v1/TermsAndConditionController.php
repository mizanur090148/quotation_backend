<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ApiCommonProcessHandler;
use App\Http\Controllers\Api\v1\ApiResponseHandler;
use App\Http\Requests\TermsAndConditionRequest;
use App\Models\TermsAndCondition;

class TermsAndConditionController extends Controller
{

    protected $apiCommonProcessHandler;

    public function __construct()
    {
        /**
         * Load API Response handler class
         */
        $this->apiCommonProcessHandler = new ApiCommonProcessHandler();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $modelData = $this->apiCommonProcessHandler->index($request, Vendor::class, []);
        return $modelData;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelData = $this->apiCommonProcessHandler->saveByModel($request, TermsAndCondition::class);
        return $modelData;
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelData = $this->apiCommonProcessHandler->show($id, Vendor::class);
        return $modelData;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelData = $this->apiCommonProcessHandler->destroy($id, Vendor::class);
        return $modelData;
    }  
}
