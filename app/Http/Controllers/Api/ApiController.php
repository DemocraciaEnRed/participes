<?php

namespace Vanguard\Http\Controllers\Api;

use Illuminate\Http\Response;
use Vanguard\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    protected $statusCode = Response::HTTP_OK;

    /**
     * Getter for statusCode
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Setter for statusCode
     *
     * @param int $statusCode Value to set
     *
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    protected function respondWithSuccess($statusCode = Response::HTTP_OK)
    {
        return $this->setStatusCode($statusCode)
            ->respondWithArray(['success' => true]);
    }

    protected function respondWithArray(array $array, array $headers = [])
    {
        $response = \Response::json($array, $this->statusCode, $headers);

        $response->header('Content-Type', 'application/json');

        return $response;
    }

    protected function respondWithError($message)
    {
        if ($this->statusCode === Response::HTTP_OK) {
            trigger_error(
                "You better have a really good reason for erroring on a 200...",
                E_USER_WARNING
            );
        }

        return $this->respondWithArray([
            'message' => $message
        ]);
    }

    /**
     * Generates a Response with a 403 HTTP header and a given message.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)
            ->respondWithError($message);
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->respondWithError($message);
    }

    /**
     * Generates a Response with a 404 HTTP header and a given message.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)
            ->respondWithError($message);
    }

    /**
     * Generates a Response with a 401 HTTP header and a given message.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)
            ->respondWithError($message);
    }
}
