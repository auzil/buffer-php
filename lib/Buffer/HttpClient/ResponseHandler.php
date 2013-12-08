<?php

namespace Buffer\HttpClient;

use Guzzle\Http\Message\Response;

/**
 * ResponseHandler takes care of decoding the response body into suitable type
 */
class ResponseHandler {

    public static function getBody(Response $response)
    {
        $body = $response->getBody(true);

        // Response body is in JSON
        if ($response->isContentType('json')) {
            $tmp = json_decode($body, true);

            if (JSON_ERROR_NONE === json_last_error()) {
                $body = $tmp;
            }
        }

        return $body;
    }

}
