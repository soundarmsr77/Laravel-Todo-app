<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::latest()->paginate(10);

        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        try {
            $todo = new Todo();
            $todo->title = $request->title;
            $todo->completed = false;
            $todo->description = $request->description;
            $todo->save();
            return redirect()->route('index')
                ->with('success', 'Todo created successfully.');
        } catch (\Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->route('create')
                ->with('error', 'Something went wrong, try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $todo = Todo::where('id', $id)->first();
        if(!$todo) {
            abort(404);
        }

        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $todo = todo::where('id', $id)->first();
        if(!$todo) {
            abort(404);
        }

        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'check' => [Rule::in(['completed'])]
        ]);

        try {
            $todo = Todo::where('id', $id)->first();
            if(!$todo) {
                abort(404);
            }

            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->completed = $request->check === 'completed' ? true : false;
            $todo->save();
            return back()->with('success', 'Todo updated successfully.');
        } catch (\Throwable $t) {
            Log::error($t->getMessage());

            return back()->with('error', 'Something went wrong, try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $todo = Todo::where('id', $id)->first();
            if(!$todo) {
                abort(404);
            }

            $todo->delete();

            return redirect()->route('index')
                ->with('success', 'Todo deleted successfully.');
        } catch (\Throwable $t) {
            Log::error($t->getMessage());

            return redirect()->route('index')
                ->with('error', 'Something went wrong, try again later.');
        }
    }

    /**
     * Check the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check(int $id)
    {
        try {
            $todo = Todo::where('id', $id)->first();
            if(!$todo) {
                abort(404);
            }

            $todo->completed = true;
            $todo->save();
            return back()->with('success', 'Todo checked successfully.');
        } catch (\Throwable $t) {
          
            Log::error($t->getMessage());

            return back()->with('error', 'Something went wrong, try again later.');
        }
    }
}