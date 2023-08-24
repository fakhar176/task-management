<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Task;

class SyncTasks extends Command
{
    protected $signature = 'tasks:sync';
    protected $description = 'Synchronize tasks from the external API';

    public function handle()
    {
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/todos');
        $apiTasks = $response->json();

        foreach ($apiTasks as $apiTask) {
            $localTask = Task::where('api_id', $apiTask['id'])->first();

            if ($localTask) {
                // Update existing task based on status
                $localTask->status = $apiTask['completed'] ? 'completed' : 'pending';
                $localTask->save();
            } else {
                // Create a new task
                Task::create([
                    'api_id' => $apiTask['id'],
                    'title' => $apiTask['title'],
                    'status' => $apiTask['completed'] ? 'completed' : 'pending',
                ]);
            }
        }

        $this->info('Tasks synchronized successfully.');
    }
}
