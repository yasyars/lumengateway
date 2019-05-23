<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TaskService; 
// use Request;

class MyTaskController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;      
    }

    public function generateKey()
    {
        return $this->taskService->obtainKey();
    }
    
    public function getListTask()
    {
        return $this->taskService->obtainTask();
    } 

    public function getDetailTask($id)
    {
        return $this->taskService->obtainTaskDetail($id);
    }

    public function addTask(Request $request)
    {
        // return $request;
        return $this->taskService->createTask($request->all());
    }

    public function deleteTask($id)
    {
        // return $id;
        return $this->taskService->removeTask($id);
    }

    public function completeTask($id)
    {
        return $this->taskService->doneTask($id);
    }

    public function uncompleteTask($id)
    {
        return $this->taskService->undoneTask($id);
    }
}
