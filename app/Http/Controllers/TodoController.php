<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            'code' => 200,
            'message' => 'fetch data successfully!',
            'data' => $todos,
        ], 200);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json([
            'code' => 200,
            'message' => 'fetch data successfully!',
            'data' => $todo,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $todo = new Todo;
        $todo->name = $request->name;
        $todo->save();

        return response()->json([
            'code' => 201,
            'message' => 'saved data successfully!',
        ], 201);
    }

    public function update($id, Request $request)
    {
        $request->validate(['name' => 'required']);
        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->save();

        return response()->json([
            'code' => 201,
            'message' => 'updated data successfully!',
        ], 201);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json([
            'code' => 201,
            'message' => 'deleted data successfully!',
        ], 201);
    }

}
