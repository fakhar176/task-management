<?php

namespace App\Http\Controllers;
use App\Models\Task;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{


    public function index()
    {
//        $tasks = Task::all();
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        // Use paginate with 10 items per page
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task = Task::create($data);

        return redirect('/');
    }


    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'in:pending,completed',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function fetchFromAPI()
    {
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/todos');
        $apiTasks = $response->json();

        foreach ($apiTasks as $apiTask) {
            Task::updateOrCreate(['api_id' => $apiTask['id']], [
                'title' => $apiTask['title'],
                'description' => $apiTask['title'],
                'status' => $apiTask['completed'] ? 'completed' : 'pending',
            ]);
        }

        return redirect('/');
    }

}
