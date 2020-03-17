<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\ApiResponseHandler;

/**
 * API Response Handler class.
 */
class ApiCommonProcessHandler
{

    protected $apiResposeHandler;

    public function __construct()
    {     
        $this->apiResposeHandler = new ApiResponseHandler();
    }

    /**
     * Get list data by Model
     *
     * @param String $modelClassName
     * @param Request $request
     *
     * @return Array
     */
    public function index(Request $request, $modelClassName, $with = '')
    {
        try {
            $modelData = $this->getData($modelClassName, $request, $with);

        } catch (Exception $ex) {
            //otherwise return error
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->error,
                '',
                $ex->getMessage()
            );
        }
        if ($modelData) {
            //Return faculty object
            /*return [
                'status' => $this->apiResposeHandler->success,
                'message' => '',
                'content' => $modelData
            ];*/
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
     * Get model data
     *
     * @param String $modelClassName
     * @param Request $request
     *
     * @return Array
     */
    private function getData($modelClassName, Request $request, $with)
    {
        // Load model class object
        $modelData = new $modelClassName();

        // Eager load data
        if ($with) {
            $modelData = $modelData->with($with);
        }

        // For search
        if ($request->search_field != ''  && $request->search_query != '') {
            $where_fileds = explode(',', $request->search_field);
            foreach ($where_fileds as $key => $field) {
                if ($key == 0) {
                    $modelData->where($field, 'LIKE', '%'. $request->search_query .'%');
                } else {
                    $modelData->orWhere($field, 'LIKE', '%'. $request->search_query .'%');
                }
            }
        }
        // For order by
        if ($request->has('sortByColumn') && $request->has('sortBy')) {
            $modelData = $modelData->orderBy($request->sortByColumn, $request->sortBy);
        } else {
            $modelData = $modelData->latest();
        }
        return $modelData->paginate();
    }

    /**
     * Add/Update model data
     *
     * @param Request $request
     * @param String $moduleName
     * @param String $modelClassName
     * @param Array $arrFieldsToSave
     *
     * @return Array
     */
    public function saveByModel(Request $request, $modelClassName)
    {
        //If ID then update, else create
        try {
            if ($request->has('id')) {
                $modelId = $request->id;
                $message = $this->apiResposeHandler->update_success;
            } else {
                $modelId = '';
                $message = $this->apiResposeHandler->save_success;
            }        
       
            $obj = $modelClassName::findOrNew($modelId);
            $obj->fill($request->all());
            $obj->save();

            // temporary
            /*if ($request->has('password') && $modelId == '') {
                $token = $this->get_user_token($obj, "TestToken");
            }*/

            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->success,
                $message,
                $obj
            );

        } catch (Exception $ex) {
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->error,
                $ex->getMessage()
            );
        }
    }

    /*public function get_user_token($user, string $token_name = null ) 
    {
        return $user->createToken($token_name)->accessToken; 
    }*/

    /**
     * Compare date with model
     *
     * @param Request $request
     * @param Class $model
     * @param String $model_id
     * @param String $model_name
     *
     * @return Array
     */
    public function show($id, $modelClassName)
    {        
        //Load selected model
        try {
            $modelData = $modelClassName::find($id);         
        } catch (Exception $ex) {
            //otherwise return error                
        }
        if ($modelData) {
            //Return faculty object
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->success,
                '',
                $modelData
            );
        } else {
            //otherwise return error
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->error,
                $this->apiResposeHandler->not_found
            );
        }
    }

    /**
     * Delete model data
     *
     * @param String $modelClassName
     * @param String $id
     *
     * @return Boolean
     */
    public function destroy($id, $modelClassName)
    {
        //Load selected model
        try {
            $modelData = $modelClassName::find($id);
        } catch (Exception $ex) {
         
        }
        if ($modelData) {
            $modelData->delete();
            //Return faculty object
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->success,
                $this->apiResposeHandler->delete_success                
            );
        } else {
            //otherwise return error
            return $this->apiResposeHandler->returnResponse(
                $this->apiResposeHandler->error,
                $this->apiResposeHandler->not_found
            );
        }
    }    
}
