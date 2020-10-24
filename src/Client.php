<?php
namespace Junipeer;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Junipeer\Request\RequestInterface;


class Client
{
    /**
     * @var int
     */
    protected $timeout = 30;

    /**
     * @var AuthInterface $auth
     */
    protected $auth;

    /** @var \GuzzleHttp\Client $httpClient */
    protected $httpClient;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => "https://api.junipeer.io/v1/",
            'verify' => false,
        ]);
    }

    /**
     * @param $endpoint
     * @param array $params
     * @return string
     */
    public function buildEndpoint($endpoint, $params = []) {
        $buildEndpoint = ltrim($endpoint, "/");
        if (!empty($params)) {
            $query =  http_build_query($params);
            $buildEndpoint .= "?" . $query;
        }

        return $buildEndpoint;
    }

    public function setAuth(AuthInterface $auth)
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @param $endpoint
     * @param RequestInterface $request
     * @param array $options
     * @return string
     * @throws \Exception
     * @throws GuzzleException
     */
    public function post($endpoint, RequestInterface $request, $options = []){
        if (!is_array($options)) {
            $options = [];
        }

        $options = array_merge($options, $this->getDefaultOptions());
        $options[RequestOptions::JSON] = $request->toArray();

        try {
            $result = $this->httpClient->post($endpoint, $options);
        } catch (\Exception $e) {
            throw $e;
        }

        return $result->getBody()->getContents();
    }

    /**
     * @param $endpoint
     * @param array $options
     * @return string
     * @throws \Exception
     * @throws GuzzleException
     */
    public function get($endpoint, $options = []){
        if (!is_array($options)) {
            $options = [];
        }

        $options = array_merge($options, $this->getDefaultOptions());
        try {
            $result = $this->httpClient->get($endpoint, $options);
        } catch (\Exception $e) {
            throw $e;
        }

        return $result->getBody()->getContents();
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        if ($this->auth === null) {
            return [];
        }

        return $this->auth->getAuthHeaders();
    }

}









