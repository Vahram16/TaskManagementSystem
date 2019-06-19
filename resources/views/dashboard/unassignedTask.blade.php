@extends('layouts.app')
@section('content')
    <table id=table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Deadline</th>
            <th scope="col">Description</th>
            <th scope="col">Users</th>
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
                        @if(Illuminate\Support\Facades\Auth::user()->role->id == 1)
                            <select name="users[]" class="user" data-id="{{$task->id}}">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                            </select>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    @push('scripts')
        <script src="/js/assignTask.js"></script>

    @endpush

@endsection