<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Factory;
use App\Models\User;

/**
 * API Response Handler class.
 */
class ApiResponseHandler
{
    /**
     * Set common status codes
     */   
    public $success = API_RESPONSE_SUCCESS;
    public $error = API_RESPONSE_ERROR;
    public $unauthorized = API_RESPONSE_UNAUTHORIZED;
    public $badRequest = API_RESPONSE_BAD_REQUEST;

    /**
    * Response messages
    */
    public $save_success = S_SAVE;
    public $save_error = E_SAVE;
    public $not_found = NOT_FOUND;
    public $update_success = S_UPDATE;
    public $update_error = E_UPDATE;
    public $delete_success = S_DELETE;
    public $error_success = E_DELETE;

    /**
     * Return response in pre-defined format
     *
     * @param String $status
     * @param Array $arrObject
     *
     * @return jSon Object
     */
   /* public function returnResponse($status = '', $message = '', $arrObject = [])
    {
        $arrReturn['status'] = $status;
        $arrReturn['message'] = $message;
        $arrReturn['content'] = $arrObject;

        return $arrReturn;
    }*/

    public function returnResponse($status = '', $message = '', $arrObject = [])
    {        

        return [
            'status' => $status,
            'message' => $message,            
            'content' => $arrObject
        ];
    }

    public function returnErrorResponse($error_message)
    {
        return [
            $this->error,
            $error_message
        ];
    }
    
}