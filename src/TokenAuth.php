<?php
namespace Junipeer;

class TokenAuth implements AuthInterface {

    /**
     * @var string $token
     */
    protected $token;

    /**
     * @return array
     */
    public function getAuthHeaders() {
        return ['Authorization' => 'Bearer ' . $this->getToken()];
    }

    /**
     * @param $token
     * @return TokenAuth
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
