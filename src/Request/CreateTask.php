<?php
namespace Junipeer\Request;

class CreateTask implements RequestInterface
{
    /**
     * @var string $userIntegrationId
     */
    protected $userIntegrationId;

    /**
     * @var string $action
     */
    protected $action;

    /**
     * @var object $data;
     */
    protected $data;

    /**
     * @return string
     */
    public function getUserIntegrationId()
    {
        return $this->userIntegrationId;
    }

    /**
     * @param string $userIntegrationId
     * @return CreateTask
     */
    public function setUserIntegrationId($userIntegrationId)
    {
        $this->userIntegrationId = $userIntegrationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return CreateTask
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return object
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param object $data
     * @return CreateTask
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function toJSON()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        return [
            'action' => $this->getAction(),
            'user_integration_id' => $this->getUserIntegrationId(),
            'data' => $this->getData(),
        ];
    }

}
