<?php
namespace Junipeer\Request;


class AuthRequest implements RequestInterface
{

    /**
     * @var string $publicApiKey
     */
    protected $publicApiKey;

    /**
     * @var string $privateApiKey
     */
    protected $privateApiKey;

    /**
     * @return string
     */
    public function getPublicApiKey()
    {
        return $this->publicApiKey;
    }

    /**
     * @param string $publicApiKey
     * @return AuthRequest
     */
    public function setPublicApiKey($publicApiKey)
    {
        $this->publicApiKey = $publicApiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateApiKey()
    {
        return $this->privateApiKey;
    }

    /**
     * @param string $privateApiKey
     * @return AuthRequest
     */
    public function setPrivateApiKey($privateApiKey)
    {
        $this->privateApiKey = $privateApiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'public_api_key' => $this->getPublicApiKey(),
            'private_api_key' => $this->getPrivateApiKey(),
        ];
    }


}
