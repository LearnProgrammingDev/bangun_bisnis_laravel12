<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        // dd($task);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {

        $pegawai = Pegawai::all();
        return view('tasks.create', compact('pegawai'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|string',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $pegawai = Pegawai::all();
        return view('tasks.edit', compact('task', 'pegawai'));
    }


    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|string',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
}
