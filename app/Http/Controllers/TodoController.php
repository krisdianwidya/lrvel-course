<?php

namespace App\Http\Controllers;

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
        $rules = ['title' => 'required|min:5|max:255'];

        $messages = [
            'title.min' => 'Please enter todo list more than :min characters',
            'title.max' => 'Please enter todo list less than :max characters'
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
}
