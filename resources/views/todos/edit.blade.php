@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Edit Todo List
                    <a href="{{ route('todos.index') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z" />
                        </svg>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.update',$todo->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $todo->title }}">
                            @if ($errors->has('title'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $errors->first('title')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $todo->description }}</textarea>
                            @if ($errors->has('description'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $errors->first('description')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection