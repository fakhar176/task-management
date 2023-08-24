@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card create-form">
                    <div class="card-header">Create Task</div>

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


                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="title">Task Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Task Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-create">Create Task</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-back">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
