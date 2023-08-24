@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card edit-form">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" required>{{ $task->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-update">Update Task</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-back">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
