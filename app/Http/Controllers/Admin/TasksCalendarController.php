<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TasksCalendarController extends Controller
{
    public function index()
    {
        $events = Task::whereNotNull('due_date')->paginate(10);

        return view('admin.tasksCalendars.index', compact('events'));
    }
}
