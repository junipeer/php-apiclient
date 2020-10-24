<?php
namespace Junipeer;

use GuzzleHttp\Exception\GuzzleException;
use Junipeer\Request\AuthRequest;
use Junipeer\Request\RefreshTokenRequest;
use Junipeer\Response\TokenResponse;

class TokenApi
{
    /**
     * @var Client $client;
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $publicKey
     * @param string $privateKey
     * @return TokenResponse
     * @throws GuzzleException
     * @throws \Exception
     */
    public function authenticate($publicKey, $privateKey)
    {
        $request = new AuthRequest();
        $request->setPublicApiKey($publicKey);
        $request->setPrivateApiKey($privateKey);

        $endpoint = $this->client->buildEndpoint("/auth/authenticate", []);
        try {
            $response = $this->client->post($endpoint, $request);
        } catch (\Exception $e) {
            throw $e;
        }

        return $this->parseTokenResponse($response);
    }

    /**
     * @param string $refreshToken
     * @return TokenResponse
     * @throws GuzzleException
     * @throws \Exception
     */
    public function refreshToken($refreshToken)
    {
        $request = new RefreshTokenRequest();
        $request->setRefreshToken($refreshToken);
        $endpoint = $this->client->buildEndpoint("/auth/refresh-token", []);
        try {
            $response = $this->client->post($endpoint, $request);
        } catch (\Exception $e) {
            throw $e;
        }

        return $this->parseTokenResponse($response);
    }


    /**
     * @param string $response
     * @return TokenResponse
     * @throws \Exception
     */
    protected function parseTokenResponse($response)
    {
        $data = json_decode($response, true);
        if (empty($data['token']) || empty($data['refresh_token'])) {
            throw new \Exception("Token not found in response");
        }

        $res = new TokenResponse();
        $res->setToken($data['token']);
        $res->setRefreshToken($data['refresh_token']);
        return $res;
    }
}
