@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Todo List
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p>Title:&#8287</p>
                        <p>{{ $todo->title }}</p>
                    </div>

                    <div class="d-flex">
                        <p>Description:&#8287</p>
                        <p>{{ $todo->description }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection