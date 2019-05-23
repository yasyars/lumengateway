<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function getProfile($username)
    {
    }

    public function addUser(Request $request)
    {
    }

    public function editProfile(Request $request)
    {
    }

}
