@extends('layouts.app')

@section('title', 'Edit todo')

@section('back', 'true')

@section('content')

    <div id="edit-content">
        <p class="name">{{ $todo->title }}</p>

        <form method="POST" action="{{ route('update', ['id' => $todo->id]) }}" autocomplete="off">
            @csrf
            @method('PUT')

            <label for="name">Name / Description</label>
            <input
                class="input @error('title') is-invalid @enderror"
                id="title"
                name="title"
                type="text"
              
                maxlength="100"
                
                autofocus
                value="{{ $todo->title }}"
            >
            <label for="description">Description *</label>
            <textarea class="form-control description"  name="description" rows="3">{{ old('description', $todo->description) }}</textarea>
            <label class="checkbox-container">Completed
                <input
                    class="checkbox"
                    type="checkbox"
                    id="check"
                    name="check"
                    value="completed"
                    {{ ($todo->completed) ? 'checked' : '' }}
                >
                <span class="checkmark"></span>
            </label>

            <button id="submit-btn" type="submit" aria-label="Submit form" title="Submit form">Send</button>
        </form>
    </div>

@endsection