<?php

namespace App\Http\Controllers;

use App\Status;
use App\Task;
use App\User;
use App\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->id == 1) {
            $tasks = Task::where('manager_id', Auth::user()->id)->has('users')
                ->get();
            return view('dashboard.index')
                ->with([
                    'tasks' => $tasks
                ]);
        } else {
            $statuses = Status::get();
            $user = Auth::user();
            $tasks = $user->tasks()
                ->get();
            return view('dashboard.index')
                ->with([
                    'tasks' => $tasks,
                    'statuses' => $statuses
                ]);
        }

    }

    public function createTask()
    {
        $users = User::where('role_id', 2)
            ->get();
        $statuses = Status::get();
        return view('dashboard.createTask')
            ->with([
                'statuses' => $statuses,
                'users' => $users]);
    }

    public function storeTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'deadline' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect(route('createTask'))
                ->withErrors($validator)
                ->withInput();
        }
        $task = Task::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'manager_id' => Auth::user()->id,
            'status' => 1
        ]);
        if (isset($request->users)) {
            foreach ($request->users as $user) {
                UserTask::create([
                    'user_id' => $user,
                    'task_id' => $task->id
                ]);
            }
        }
        return redirect(route('indexAdmin'));

    }

    public function changeStatus(Request $request)
    {
        $task = Task::find($request->id);
        $task->update([
            'status' => $request->value
        ]);

    }

    public function unassignedTask()
    {
        $user = Auth::user();
        $tasks = Task::doesnthave('users')
            ->get();
        $users = User::where('role_id', 2)
            ->get();
        return view('dashboard.unassignedTask')
            ->with([
                'tasks' => $tasks,
                'users' => $users
            ]);
    }

    public function assignTask(Request $request)
    {
        $task = Task::find($request->id);
        $user = $task->users->where('id', $request->value)->first();
        if (empty($user)) {
            var_dump(888888);
            UserTask::create([
                'user_id' => $request->value,
                'task_id' => $task->id
            ]);
            $task->update([
                'manager_id' => Auth::user()->id
            ]);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
}
