@extends('layouts.app')

@section('title', 'Create new todo')

@section('back', 'true')

@section('content')

    <div id="create-content">
        <form method="POST" action="{{ route('store') }}" autocomplete="off">
            @csrf

            <label for="title">Title *</label>
            <input
                class="input @error('title') is-invalid @enderror"
                id="title"
                name="title"
                type="text"
               
                maxlength="100"
                
                value="{{ old('title', '') }}"
            >
            <label for="description">Description *</label>
            <textarea class="form-control description"  name="description" rows="3">{{ old('description', '') }}</textarea>
            <button id="submit-btn" type="submit" aria-label="Submit form" title="Submit form">Send</button>
        </form>
    </div>

@endsection