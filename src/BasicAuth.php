<?php
namespace Junipeer;

class BasicAuth implements AuthInterface {

    protected $username;
    protected $password;

    /**
     * @return array
     */
    public function getAuthHeaders() {
        return [
            'auth' => [
                $this->username,
                $this->password
            ]
        ];
    }

    /**
     * @param $username
     * @param $password
     * @return BasicAuth
     */
    public function setBasicAuth($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

}
