<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\TaskList;

class ListController extends Controller
{
    /**
     * Import classes we need
     */
    public function index()
    { 
        
        // 1. Get only the lists that belong to the logged-in user
        // auth()->id() gives the current user's ID
        // 3. Get the results as a collectioN
        $lists = TaskList::where('user_id', auth()->id())
          
        // 2. Load the related tasks for each list (Eager Loading)

          ->with('tasks') ->get();

        // 4. Return a React/Inertia page called 'Lists/Index'
        // 5. Pass data to the React component: lists + flash messages
       return Inertia::render('Lists/Index',[
        'lists'=>$lists,

         // Flash messages from session (used for notifications)
        'flash'=>[
            'success'=>session('success'),
            'error'=>session('error')
        ]
       ]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
