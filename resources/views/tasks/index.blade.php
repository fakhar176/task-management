@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Task Dashboard</div>

                    <div class="card-body">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                        <a href="{{ route('tasks.sync') }}" class="btn btn-secondary">Sync from API</a>
                    </div>
                </div>

                <ul class="task-list">
                    @foreach($tasks as $task)
                        <li class="task-item">
                            <h4 class="task-title">{{ $task->title }}</h4>
                            <p class="task-description">{{ $task->description }}</p>
                            <span class="task-status {{ $task->status === 'completed' ? 'badge-success' : 'badge-warning' }}">
                            {{ ucfirst($task->status) }}
                           </span>


                            <div class="float-right">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-action btn-info">Edit</a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-action btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Task">Delete</button>
                                </form>

                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="custom-pagination">
                        @if ($tasks->onFirstPage())
                            <span class="disabled-link">Previous</span>
                        @else
                            <a href="{{ $tasks->previousPageUrl() }}" class="pagination-link">Previous</a>
                        @endif

                            @php
                                $maxPages = 10; // Maximum number of pagination links to show
                                $halfMaxPages = (int) ceil($maxPages / 2);
                                $startPage = max($tasks->currentPage() - $halfMaxPages, 1);
                                $endPage = min($startPage + $maxPages - 1, $tasks->lastPage());
                            @endphp

                            @for ($page = $startPage; $page <= $endPage; $page++)
                                @if ($page == $tasks->currentPage())
                                    <span class="current-page">{{ $page }}</span>
                                @else
                                    <a href="{{ $tasks->url($page) }}" class="pagination-link">{{ $page }}</a>
                                @endif
                            @endfor


                        @if ($tasks->hasMorePages())
                            <a href="{{ $tasks->nextPageUrl() }}" class="pagination-link">Next</a>
                        @else
                            <span class="disabled-link">Next</span>
                        @endif
                    </div>


            </div>
        </div>
    </div>
@endsection
