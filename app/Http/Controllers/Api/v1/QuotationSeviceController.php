<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\ApiResponseHandler;
use App\Http\Controllers\Api\v1\ApiCommonProcessHandler;
use App\Http\Requests\ServiceRequest;
use App\Models\QuotationService;

class QuotationServiceController extends Controller
{

    protected $apiResposeHandler;

    public function __construct()
    {
        /**
         * Load API Response handler class
         */
        $this->apiResposeHandler = new ApiResponseHandler();
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
            $modelData = new QuotationService();
            $modelData = $modelData->orderBy($request->sortByColumn ?? 'id', $request->sortBy ?? 'desc');
            $modelData = $modelData->paginate();

        } catch (Exception $ex) {
            //otherwise return error
            return $this->apiResposeHandler->returnErrorResponse($ex->getMessage());
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
    public function store(ServiceRequest $request)
    {
        $modelData = $this->apiCommonProcessHandler->saveByModel($request, Service::class);
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
        $modelData = $this->apiCommonProcessHandler->show($id, Service::class);
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
        $modelData = $this->apiCommonProcessHandler->destroy($id, Service::class);
        return $modelData;
    }
}
