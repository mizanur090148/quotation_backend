<?php

/**
 * Define system constants
 */
define('SUPER_ADMIN', 'super-admin');

/**
 * Define API Response Code constants
 */
define('API_RESPONSE_SUCCESS', '200');
define('API_RESPONSE_ERROR', '500');
define('API_RESPONSE_UNAUTHORIZED', '401');
define('API_RESPONSE_BAD_REQUEST', '400');

/**
 * Response Message
 */
define('S_SAVE', 'Successfuly created');
define('E_SAVE', 'Not created');

define('NOT_FOUND', 'Data not found');

define('S_UPDATE', 'Successfuly updated');
define('E_UPDATE', 'Not updated');

define('S_DELETE', 'Successfuly deleted');
define('E_DELETE', 'Successfuly created');


/**
 * Compare dates between
 *
 * @param Date $startDate
 * @param Date $endDate
 * @param Date $compareDate
 *
 * @return Boolean
 */
if (!function_exists('compareDateBetween')) {
    function compareDateBetween($startDate, $endDate, $compareDate)
    {
        try {
            $startDate = Carbon\Carbon::parse($startDate);
            $endDate = Carbon\Carbon::parse($endDate);
            $compareDate = Carbon\Carbon::parse($compareDate);

            return $compareDate->between($startDate, $endDate);
        } catch (\Exception $ex) {
            return false;
        }
    }
}


if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        if (session()->has('superAdmin') && session()->has('TENANT_DB_DATABASE')) {
            return session()->get('superAdmin');
        }
    }

}

/**
 * Get Current user object
 */
if (!function_exists('currentUser')) {
    function currentUser()
    {
        if (session()->has('currentUser')) {
            return session()->get('currentUser');
        }

        return null;
    }
}

if (!function_exists('getAllRole')) {
    function getAllRole()
    {
        if (session()->has('roles')) {
            return session()->get('roles');
        }

        return null;
    }
}

/**
 * Show message
 * @param $messages
 * @return string
 */
function showErrorMessages($messages)
{
    if (count($messages) > 0) {
        $messageView = '<ul>';
        foreach ($messages as $message) {
            if (is_array($message)) {
                foreach ($message as $msg) {
                    $messageView .= '<li>' . $msg . '</li>';
                }
            } else {
                $messageView .= '<li>' . $message . '</li>';
            }
        }

        $messageView .= '</ul>';

        return $messageView;
    }
}