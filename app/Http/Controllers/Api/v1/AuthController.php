<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiResponseHandler;
use App\Http\Controllers\Api\v1\ApiCommonProcessHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\FactoryRequest;
use App\Models\Factory;
use Auth;

class AuthController extends Controller
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
    public function login(Request $request)
    {
        try {
            $credential = [
                'email' => $request->email, 
                'password' => $request->password
            ];            

            if (auth()->attempt($credential)) {
                $user = Auth::user();               

                return $this->apiResposeHandler->returnResponse(
                    $this->apiResposeHandler->success,
                    '',
                    $user
                );
            }
        } catch (Exception $e) {
            
        }

        return $this->apiResposeHandler->returnResponse(
            $this->apiResposeHandler->error,
            'Unauthorized Access'
        );
    }

    public function getUserToken($user, string $token_name = null ) 
    {
        return $user->createToken($token_name)->accessToken; 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FactoryRequest $request)
    {
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
        try {            
            $user = Auth::user();           
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->success,
                '',
                $user
            );
        } catch (Exception $e) {
            
        }

        return $this->apiResposeHandler->returnResponse(
            $this->apiResposeHandler->error,
            'Unauthorized Access'
        );
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
