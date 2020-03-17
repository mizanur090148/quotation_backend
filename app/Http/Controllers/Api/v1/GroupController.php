<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiResponseHandler;
use App\Http\Controllers\Api\v1\ApiCommonProcessHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;

class GroupController extends Controller
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
    public function show($id)
    {
        $modelData = $this->apiCommonProcessHandler->show($id, Group::class);
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
        $modelData = $this->apiCommonProcessHandler->saveByModel($request, Group::class);
        return $modelData;
    }   
}
