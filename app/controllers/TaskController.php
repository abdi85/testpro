<?php

require "app/models/Task.php";

class TaskController
{
    public function index()
    {
        $tasks = Task::fetchAll();

        return Helper::view("show_tasks",[
                'tasks' => $tasks
            ]);
    }

    public function show()
    {
        if(isset($_GET["id"]) && ctype_digit($_GET["id"]))
        {
            $task = Task::fetchId($_GET["id"]);

            if($task == null)
            {
                // raising an exception maybe not the best solution
                throw new Exception("TASK NOT FOUND.", 1);
            }
        }
        else {
            throw new Exception("TASK NOT FOUND.", 1);
        }

        return Helper::view("show_task",[
                'currentTask' => $task,
            ]);
    }
}
