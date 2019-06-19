@extends('layouts.app')
@section('content')
    <table id=table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Deadline</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                {{--<th scope="row">{{$one_user->id}}</th>--}}
                <td>{{$task->title}}</td>
                <td>{{$task->deadline}}</td>
                <td>{{$task->description}}</td>
                <td>

                    <div class="form-group">
                        @if(Illuminate\Support\Facades\Auth::user()->role->id == 2)
                            <select name="statuses[]" class="status" data-id="{{$task->id}}">

                                <option value="1" {{ $task->status == 1 ? "selected" : ""}}> Assigned</option>
                                <option value="2" {{ $task->status == 2 ? "selected" : ""}}> IN Progress</option>
                                <option value="3" {{ $task->status == 3 ? "selected" : ""}}> Done</option>
                            </select>
                            @else
                            <td>{{$task->status}}</td>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @if(Illuminate\Support\Facades\Auth::user()->role->id == 1)
        <a class="btn btn-danger" href="{{route('unassignedTask')}}">Unassigned Task </a>
        <a class="btn btn-success" href="{{route('createTask')}}">CreateTask </a>
    @endif
    @push('scripts')
        <script src="/js/status.js"></script>

    @endpush

@endsection