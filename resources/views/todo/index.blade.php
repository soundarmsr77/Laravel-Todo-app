@extends('layouts.app')

@section('title', 'Todo\'s List')

@section('actions')
    <button
        type="button"
        id="create-btn"
        aria-label="Go to the create page"
        title="Go to the create page"
        onclick="window.location.href='{{ route('create') }}';"
    >
        Create todo
    </button>
@endsection

@section('content')

    <div id="index-content">
        <div class="grid">
            <div class="grid-header">
                <strong>Todos</strong>
            </div>
            @if ($todos->isNotEmpty()) 
                @foreach ($todos as $task)
                    <div>
                        <p class="{{ $task->completed ? 'checked' : '' }}">{{ $task->title }}</p>
                    </div>
                    <div class="grid-actions">
                        @if (!$task->completed)
                            <form action="{{ route('check', ['id' => $task->id]) }}" method="POST">
                                @csrf
                                <button
                                    id="submit-btn"
                                    type="submit"
                                    class="grid-item-check"
                                    aria-label="Check task"
                                    title="Check task"
                                ></button>
                            </form>
                        @endif
                        <button
                            type="button"
                            class="grid-item-view"
                            aria-label="View task"
                            title="View task"
                            onclick="window.location.href='{{ route('show', ['id' => $task->id]) }}';"
                        ></button>
                        <button
                            type="button"
                            class="grid-item-edit"
                            aria-label="Edit task"
                            title="Edit task"
                            onclick="window.location.href='{{ route('edit', ['id' => $task->id]) }}';"
                        ></button>
                        <form action="{{ route('destroy', ['id' => $task->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button
                                id="submit-btn"
                                type="submit"
                                class="grid-item-remove"
                                aria-label="Remove task"
                                title="Remove task"
                            ></button>
                        </form>
                    </div>
                @endforeach
                <div class="grid-links">
                    {{ $todos->links() }}
                </div>
            @else
                <div class="grid-norecords">
                    <span>No records found.</span>
                </div>
            @endif
        </div>
    </div>

@endsection