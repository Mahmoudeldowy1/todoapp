@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Update Task:</h3>
            </div>
            <div class="card-body">
                <form action="{{route('task.update',$task)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Edit Task</label>
                        <input type="text" name="task_name" class="form-control" value="{{$task->task_name}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>

        </div>
    </div>

@endsection
