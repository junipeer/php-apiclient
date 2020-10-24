<?php
namespace Junipeer\Response;

/**
 * Class TaskAction
 * @package Junipeer\Response
 */
class TaskAction
{
    /**
     * @var string $userIntegrationId
     */
    protected $userIntegrationId;

    /**
     * @var string $taskId
     */
    protected $taskId;

    /**
     * @var string $action
     */
    protected $action;

    /**
     * @return string
     */
    public function getUserIntegrationId()
    {
        return $this->userIntegrationId;
    }

    /**
     * @param string $userIntegrationId
     */
    public function setUserIntegrationId($userIntegrationId)
    {
        $this->userIntegrationId = $userIntegrationId;
    }

    /**
     * @return string
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @param string $taskId
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
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
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

}
