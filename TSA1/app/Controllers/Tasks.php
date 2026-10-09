<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function today()
    {
        $taskModel = new TaskModel();
        $today = date('Y-m-d');

        $data = [
            'title' => "Today's Tasks",
            'today' => $today,
            'tasks' => $taskModel
                ->where('task_date', $today)
                ->orderBy('created_at', 'ASC')
                ->findAll(),
        ];

        return view('today', $data);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'title' => 'All Tasks',
            'tasks' => $taskModel
                ->orderBy('task_date', 'ASC')
                ->orderBy('created_at', 'ASC')
                ->findAll(),
        ];

        return view('tasks', $data);
    }
}