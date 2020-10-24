<?php
namespace Junipeer\Response;

/**
 * Class TokenResponse
 * @package Junipeer\Response
 */
class TokenResponse
{
    /**
     * @var string $token;
     */
    protected $token;

    /**
     * @var string $refreshToken
     */
    protected $refreshToken;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return TokenResponse
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     * @return TokenResponse
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }
}
