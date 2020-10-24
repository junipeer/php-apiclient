<?php
namespace Junipeer\Response;

/**
 * Class IntegrationInfo
 * @package Junipeer\Response
 */
class IntegrationInfo
{
    /**
     * @var string $userIntegrationId
     */
    protected $userIntegrationId;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @return string
     */
    public function getUserIntegrationId()
    {
        return $this->userIntegrationId;
    }

    /**
     * @param string $userIntegrationId
     * @return IntegrationInfo
     */
    public function setUserIntegrationId($userIntegrationId)
    {
        $this->userIntegrationId = $userIntegrationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return IntegrationInfo
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
