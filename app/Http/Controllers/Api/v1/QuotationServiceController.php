<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ApiResponseHandler;
use App\Http\Controllers\Api\v1\ApiCommonProcessHandler;
use App\Http\Requests\QuotationServiceRequest;
use App\Models\QuotationService;

class QuotationServiceController extends Controller
{

    protected $apiResposeHandler;
    protected $apiCommonProcessHandler;

    public function __construct()
    {
        /**
         * Load API Response handler class
         */
        $this->apiResposeHandler = new ApiResponseHandler();
        $this->apiCommonProcessHandler = new ApiCommonProcessHandler();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {            
            // Load model class object
            $modelData = QuotationService::with('quotation', 'service');
            $modelData = $modelData->orderBy($request->sortByColumn ?? 'id', $request->sortBy ?? 'desc');
            $modelData = $modelData->get();

        } catch (Exception $ex) {
            //otherwise return error
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->error,
                '',
                $ex->getMessage()
            );
        }
        if ($modelData) {          
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->success,
                '',
                $modelData
            );
        } else {
            //otherwise return error
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->responseStatus->error,
                $modelData
            );
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationServiceRequest $request)
    {
        $modelData = $this->apiCommonProcessHandler->saveByModel($request, QuotationService::class);
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
        $modelData = $this->apiCommonProcessHandler->show($id, QuotationService::class);
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
        $modelData = $this->apiCommonProcessHandler->destroy($id, QuotationService::class);
        return $modelData;
    }
}
