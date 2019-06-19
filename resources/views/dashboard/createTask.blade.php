@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('storeTask')}}" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput2">Title</label>
                <input name='title' type="text" class="form-control" id="formGroupExampleInput2"
                       placeholder="title">
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="formGroupExampleInput2">Deadline</label>
                <input name='deadline' type="text" class="form-control" id="formGroupExampleInput2"
                       placeholder="deadline">
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description</label>
                    <input name='description' type="text" class="form-control" id="formGroupExampleInput2"
                           placeholder="description">
                </div>
                <label for="formGroupExampleInput2">Users</label>
                <div class="form-group">

                    <select name="users[]" id="user" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <button type="submit" class="btn btn-success">Create
            </button>
        </form>
    </div>



@endsection