<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::where('role', '=', 'member')->orderBy('name')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // Fetch a single user by ID
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function delete($id)
    {
        // Delete a user by ID
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
