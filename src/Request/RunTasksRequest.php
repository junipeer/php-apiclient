<?php
namespace Junipeer\Request;


class RunTasksRequest implements RequestInterface
{

    /**
     * @var $tasks CreateTask[]
     */
    protected $tasks;

    /**
     * @return CreateTask[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param CreateTask[] $tasks
     * @return RunTasksRequest
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
        return $this;
    }


    public function toJSON()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        $tasksArray = [];
        foreach($this->getTasks() as $task) {
            $tasksArray[] = $task->toArray();
        }

        return [
            'tasks' => $tasksArray
        ];
    }


}
