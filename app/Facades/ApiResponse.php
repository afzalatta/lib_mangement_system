<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponse
{


    protected static function getFacadeAccessor()
    {

        return 'apiresponse';
    }

    public static function successResponse($type, $message, $data = [])
    {

        $successResponseData = [];
        $successResponseData['status'] = true;
        switch ($type) {

            case 'SUCCESS':

                $successResponseData['code'] = HttpCode::SUCCESS;
                $successResponseData['message'] = $message;
                $successResponseData['data'] = $data;

                break;
        }

        return $successResponseData;
    }

    public static function errorResponse($type, $message, $data = [])
    {

        $errorResponseData = [];
        $errorResponseData['status'] = false;

        switch ($type) {

            case 'VALIDATION_ERROR':

                $errorResponseData['code'] = HttpCode::VALIDATION_FIALED;
                $errorResponseData['message'] = $message;
                $errorResponseData['data'] = $data;

                break;

            case 'UNAUTHORIZED_ERROR':

                $errorResponseData['code'] = HttpCode::UNAUTHORIZED;
                $errorResponseData['message'] = $message;
                $errorResponseData['data'] = $data;

                break;
            case 'BAD_REQUEST':

                $errorResponseData['code'] = HttpCode::BAD_REQUEST;
                $errorResponseData['message'] = $message;
                $errorResponseData['data'] = $data;

                break;
            case 'SERVER_ERROR':

                $errorResponseData['code'] = HttpCode::SERVER_ERROR;
                $errorResponseData['message'] = $message;
                $errorResponseData['data'] = $data;

                break;
            case 'SERVICE_UNAVAILABLE':

                $errorResponseData['code'] = HttpCode::SERVICE_UNAVAILABLE;
                $errorResponseData['message'] = $message;
                $errorResponseData['data'] = $data;

                break;
        }
        return $errorResponseData;
    }
}
