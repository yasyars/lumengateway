<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TaskService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.tasks.base_uri');
    }

    public function obtainKey()
    {
        return $this->performRequest('GET','/key');
    }

    public function obtainTask()
    {
        return $this->performRequest('GET', '/api/task/list');
    }

    public function obtainTaskDetail($id)
    {
        return $this->performRequest('GET', "/api/task/{$id}");
    }

    public function createTask($data)
    {
        return $this->performRequest('POST', "/api/task/", $data);
    }

    public function removeTask($id)
    {
        return $this->performRequest('DELETE',"/api/task/{$id}");
    }

    public function doneTask($id)
    {
        return $this->performRequest('PUT',"/api/task/{$id}/done");
    }

    public function undoneTask($id)
    {
        return $this->performRequest('PUT',"/api/task/{$id}/undone");
    }

}