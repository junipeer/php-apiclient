<?php
namespace Junipeer\Request;

/**
 * Class RefreshTokenRequest
 * @package Junipeer\Request
 */
class RefreshTokenRequest implements RequestInterface
{

    /**
     * @var string $refreshToken
     */
    protected $refreshToken;

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     * @return RefreshTokenRequest
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
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
            'token' => $this->getRefreshToken(),
        ];
    }


}
