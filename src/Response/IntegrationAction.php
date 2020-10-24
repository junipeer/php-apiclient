<?php


namespace Junipeer\Response;


/**
 * Class IntegrationAction
 * @package Junipeer\Response
 */
class IntegrationAction
{
    /**
     * @var string $action
     */
    protected $action;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var $fields IntegrationActionField[]
     */
    protected $fields;

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return IntegrationAction
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return IntegrationAction
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return IntegrationActionField[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param IntegrationActionField[] $fields
     * @return IntegrationAction
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

}
