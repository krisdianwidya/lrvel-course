@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ Auth::user()->name }} Todo List
                    <a href="{{ route('todos.create') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </a>
                </div>
                <div class="card-body">
                    <ul>
                        @forelse ($todos as $todo)
                        <li>{{ $todo->title }}</li>
                        @empty
                        <p>You don't have todo list..please create one!!</p>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection