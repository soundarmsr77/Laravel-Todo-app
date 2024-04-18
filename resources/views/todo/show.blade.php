@extends('layouts.app')

@section('title', 'Show todo')

@section('back', 'true')

@section('content')

    <div id="show-content">
        <p class="name">{{ $todo->title }}</p>
        <p class="name">{{ $todo->description }}</p>
        @if ($todo->completed)
            <p class="completed-task">Completed Todo</p>
        @else
            <p class="pending-task">Pending Todo</p>
        @endif
        <div class="bottom">
            <div id="created-at-div">
                <label for="created-at">Created at</label>
                <p id="created-at">{{ date('d/m/Y', strtotime($todo->created_at)) }}</p>
            </div>
            <div id="updated-at-div">
                <label for="updated-at">Created at</label>
                <p id="updated-at">{{ date('d/m/Y', strtotime($todo->updated_at)) }}</p>
            </div>
        </div>
    </div>

@endsection