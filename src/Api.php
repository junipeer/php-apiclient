<?php

namespace Junipeer;

use GuzzleHttp\Exception\GuzzleException;
use Junipeer\Response\IntegrationAction;
use Junipeer\Response\IntegrationActionField;
use Junipeer\Response\IntegrationInfo;
use Junipeer\Response\IntegrationInfoFull;
use Junipeer\Response\TaskAction;

class Api
{
    /**
     * @var Client $client;
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function setAuthentication(AuthInterface $auth) {
        $this->client->setAuth($auth);
        return $this;
    }

    /**
     * @param Request\RunTasksRequest $request
     * @return TaskAction[]
     * @throws GuzzleException
     * @throws \Exception
     */
    public function runTasks(Request\RunTasksRequest $request)
    {
        $endpoint = $this->client->buildEndpoint("/tasks/run", []);
        try {
            $response = $this->client->post($endpoint, $request);
        } catch (\Exception $e) {
            throw $e;
        }

        $data = json_decode($response, true);
        $data = isset($data['tasks']) && is_array($data['tasks']) ? $data : [];

        $ret = [];
        foreach ($data as $task) {
            $dto = new TaskAction();
            $dto->setAction($task['action']);
            $dto->setTaskId($task['task_id']);
            $dto->setUserIntegrationId($task['user_integration_id']);
            $ret[] = $dto;
        }

        return $ret;
    }

    /**
     * @return IntegrationInfo[]
     * @throws \Exception
     * @throws GuzzleException
     */
    public function loadIntegrationNames()
    {
        $endpoint = $this->client->buildEndpoint("/fields/integrations", []);
        try {
            $response = $this->client->get($endpoint);
        } catch (\Exception $e) {
            throw $e;
        }

        $ret = [];
        $data = json_decode($response, true);
        foreach ($data as $arr) {
            $info = new IntegrationInfo();
            $info->setName($arr['name']);
            $info->setUserIntegrationId($arr['user_integration_id']);

            $ret[] = $info;
        }

        return $ret;
    }


    /**
     * @return IntegrationInfo[]
     * @throws \Exception
     * @throws GuzzleException
     */
    public function loadAllIntegrations()
    {
        $endpoint = $this->client->buildEndpoint("/fields", []);
        try {
            $response = $this->client->get($endpoint);
        } catch (\Exception $e) {
            throw $e;
        }


        $ret = [];
        $data = json_decode($response, true);
        foreach ($data['available_integrations'] as $arr) {
            $ret[] = $this->parseIntegrationResponse($arr);
        }

        return $ret;
    }


    /**
     * @param $userIntegrationId string
     * @return IntegrationInfoFull
     * @throws \Exception
     * @throws GuzzleException
     */
    public function loadIntegrationById($userIntegrationId)
    {
        $endpoint = $this->client->buildEndpoint("/fields/" . $userIntegrationId, []);
        try {
            $response = $this->client->get($endpoint);
        } catch (\Exception $e) {
            throw $e;
        }

        $data = json_decode($response, true);
        return $this->parseIntegrationResponse($data);
    }

    /**
     * @param $arr
     * @return IntegrationInfoFull
     */
    protected function parseIntegrationResponse($arr)
    {
        $info = new IntegrationInfoFull();
        $info->setName($arr['name']);
        $info->setUserIntegrationId($arr['user_integration_id']);

        $actions = [];
        $resActions = isset($arr['actions']) ?$arr['actions'] : [];
        foreach ($resActions as $action) {
            $actionObj = new IntegrationAction();
            $actionObj->setAction($action['action']);
            $actionObj->setTitle($action['title']);

            $fields = [];
            $resFields = isset($action['fields']) ? $action['fields'] : [];
            foreach ($resFields as $field) {
                $fieldObj = new IntegrationActionField();
                $fieldObj->setKey($field['key']);
                $fieldObj->setTitle($field['title']);
                $fieldObj->setRequired($field['required']);
                $fieldObj->setFieldType($field['field_type']);

                $fields[] = $fieldObj;
            }

            $actionObj->setFields($fields);
            $actions[] = $actionObj;
        }

        $info->setActions($actions);
        return $info;
    }
}
