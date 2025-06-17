<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::orderBy('name')->paginate(10);
        return view('users.index', compact('users'));
    }
}
