<?php
namespace Junipeer\Response;

/**
 * Class IntegrationActionField
 * @package Junipeer\Response
 */
class IntegrationActionField
{
    /**
     * @var bool $required
     */
    protected $required;

    /**
     * @var string $key
     */
    protected $key;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var string $fieldType
     */
    protected $fieldType;

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param bool $required
     * @return IntegrationActionField
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return IntegrationActionField
     */
    public function setKey($key)
    {
        $this->key = $key;
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
     * @return IntegrationActionField
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * @param string $fieldType
     * @return IntegrationActionField
     */
    public function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;
        return $this;
    }

}
