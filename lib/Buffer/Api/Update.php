<?php

namespace Buffer\Api;

use Buffer\HttpClient\HttpClient;

/**
 * Returns a social media update api instance.
 *
 * @param $id Identifier of a social media update
 * @param $client HttpClient Instance
 */
class Update
{

    private $id;
    private $client;

    public function __construct($id, HttpClient $client)
    {
        $this->id = $id;
        $this->client = $client;
    }

    /**
     * Returns a single social media update.
     * '/updates/:id' GET
     *
     */
    public function get(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        return $this->client->get("/updates/".rawurlencode($this->id)."", $body, $options);
    }

    /**
     * Returns the detailed information on individual interactions with the social media update such as favorites, retweets and likes.
     * '/updates/:id/interactions' GET
     *
     */
    public function interactions(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        return $this->client->get("/updates/".rawurlencode($this->id)."/interactions", $body, $options);
    }

    /**
     * Create one or more new status updates.
     * '/updates/create' POST
     *
     * @param $text The status update text.
     * @param $profile_ids An array of profile id’s that the status update should be sent to. Invalid profile_id’s will be silently ignored.
     */
    public function create($text, $profile_ids, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());
        $body['text'] = $text;
        $body['profile_ids'] = $profile_ids;

        return $this->client->post("/updates/create", $body, $options);
    }

    /**
     * Edit an existing, individual status update.
     * '/updates/:id/update' POST
     *
     * @param $text The status update text.
     */
    public function update($text, array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());
        $body['text'] = $text;

        return $this->client->post("/updates/".rawurlencode($this->id)."/update", $body, $options);
    }

    /**
     * Immediately shares a single pending update and recalculates times for updates remaining in the queue.
     * '/updates/:id/share' POST
     *
     */
    public function share(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        return $this->client->post("/updates/".rawurlencode($this->id)."/share", $body, $options);
    }

    /**
     * Permanently delete an existing status update.
     * '/updates/:id/destroy' POST
     *
     */
    public function destroy(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        return $this->client->post("/updates/".rawurlencode($this->id)."/destroy", $body, $options);
    }

    /**
     * Move an existing status update to the top of the queue and recalculate times for all updates in the queue. Returns the update with its new posting time.
     * '/updates/:id/move_to_top' POST
     *
     */
    public function top(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        return $this->client->post("/updates/".rawurlencode($this->id)."/move_to_top", $body, $options);
    }

}
