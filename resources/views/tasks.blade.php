@extends('layout')

@section('content')



    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Create New Todo List:</h3>
            </div>
            <div class="card-body">
                <form action="{{route('task.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">ADD Task</label>
                        <input type="text" name="task_name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">New Task</button>
                </form>
            </div>
            <div class="card-body">

                    <table class="table">
                    <thead>
                    <tr>
                        <th>Task name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tasks as $task)
                    <tr>
                        <td>
                            @if($task->completed == false )
                                <strike> {{$task->task_name}}</strike>
                            @else
                                {{$task->task_name}}
                            @endif
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    @if($task->completed == false)
                                        <a href="{{route('task.completed',$task)}}"><button type="submit" class="btn btn-success btn-block">Complete</button></a>
                                    @else
                                        <a href="{{route('task.completed',$task)}}"><button type="submit" class="btn btn-dark btn-block">Not Complete</button></a>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <form action="{{route('task.destroy',$task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                    </form>
                                </div>

                                <div class="col-md-4">
                                    <a href="{{route('task.edit',$task->id)}}"><button type="submit" class="btn btn-secondary btn-block">Edit</button></a>
                                </div>

                            </div>

                        </td>
                    </tr>
                @endforeach
                </table>


            </div>
        </div>
    </div>



@endsection
