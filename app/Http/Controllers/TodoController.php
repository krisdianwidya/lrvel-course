<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:10|max:255'
        ];

        $messages = [
            'title.min' => 'Please enter title more than :min characters',
            'title.max' => 'Please enter title less than :max characters',
            'description.min' => 'Please enter description more than :min characters',
            'description.max' => 'Please enter description less than :max characters'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        auth()->user()->todos()->create($request->all());
        return redirect(route('todos.index'))->with('message', 'New Todo Created Successfully');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:10|max:255'
        ];

        $messages = [
            'title.min' => 'Please enter title more than :min characters',
            'title.max' => 'Please enter title less than :max characters',
            'description.min' => 'Please enter desription more than :min characters',
            'description.max' => 'Please enter desription less than :max characters'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $todo->update(
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );
        return redirect(route('todos.index'))->with('message', 'Todo Edited Successfully');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todos.index'))->with('message', 'Todo Deleted Successfully');
    }
}
