<?php
namespace Junipeer\Response;

/**
 * Class IntegrationInfoFull
 * @package Junipeer\Response
 */
class IntegrationInfoFull
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
     * @var $actions IntegrationAction[]
     */
    protected $actions;

    /**
     * @return string
     */
    public function getUserIntegrationId()
    {
        return $this->userIntegrationId;
    }

    /**
     * @param string $userIntegrationId
     * @return IntegrationInfoFull
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
     * @return IntegrationInfoFull
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return IntegrationAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param IntegrationAction[] $actions
     * @return IntegrationInfoFull
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
        return $this;
    }


}
