<?php

namespace EvgenyL\Q5TAPIClient;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

class Q5TAPIClient
{

    /** @var \GuzzleHttp\Client */
    private $client;

    public function __construct(\GuzzleHttp\Client $httpClient)
    {
        $this->client = $httpClient;
    }

    /**
     * Returns short URL.
     *
     * @param string    $URL
     * @param integer   $externalUserId
     * @return null|string
     */
    public function getShortURL($URL, $externalUserId = 0)
    {
        try {
            $response = $this->client->post('urls', [
                RequestOptions::JSON => [
                    'url' => $URL,
                    'external_user_id' => (int)$externalUserId,
                ],
            ]);
        } catch (ClientException $exception) {
            return null;
        }

        $data = json_decode($response->getBody(), JSON_OBJECT_AS_ARRAY);
        $shortURL = null;
        if (isset($data['data']['short_url'])) {
            $shortURL = $data['data']['short_url'];
        }

        return $shortURL;
    }

}
