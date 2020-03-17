<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiResponseHandler;
use App\Http\Controllers\Api\v1\ApiCommonProcessHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\FactoryRequest;
use App\Models\Factory;

use Illuminate\Http\JsonResponse;

class FactoryController extends Controller
{

    protected $apiCommonProcessHandler;

    public function __construct()
    {
        /**
         * Load API Response handler class
         */
        //$this->apiCommonProcessHandler = new ApiCommonProcessHandler();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modelData = $this->apiCommonProcessHandler->index($request, Factory::class);
        return $modelData;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(FactoryRequest $request)
    public function store(Request $request)
    {
        $input = [
            'name' => $request->name,
            'address' => $request->address,
            'responsible_person' => $request->responsible_person,
            'email' => $request->email,
            'group_id' => $request->group_id
        ];

        $factory = Factory::create($input);
        //dd($factory);

        return response()->josn($factory, 201);

        $modelData = $this->apiCommonProcessHandler->saveByModel($request, Factory::class);
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
        $modelData = $this->apiCommonProcessHandler->show($id, Factory::class);
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
        $modelData = $this->apiCommonProcessHandler->destroy($id, Factory::class);
        return $modelData;
    }
}
