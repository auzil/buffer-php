<?php

namespace Buffer\Api;

use Buffer\HttpClient\HttpClient;

/**
 * Returns api instance to get auxilary information about Buffer useful when creating your app.
 *
 * @param $client HttpClient Instance
 */
class Info
{

    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Returns an object with the current configuration that Buffer is using, including supported services, their icons and the varying limits of character and schedules.
     * '/info/configuration' GET
     *
     */
    public function show(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        return $this->client->get("/info/configuration", $body, $options);
    }

}