<?php

namespace Buffer\HttpClient;

use Guzzle\Http\Message\RequestInterface;

/**
 * RequestHandler takes care of encoding the request body into format given by options
 */
class RequestHandler {

    public static function setBody(RequestInterface $request, $body, $options)
    {
        $type = isset($options['request_type']) ? $options['request_type'] : "form";
        $header = null;

        if ($type == 'form') {
            return $request->addPostFields($body);
        } else {
            return $request->setBody($body, $header);
        }
    }

}
