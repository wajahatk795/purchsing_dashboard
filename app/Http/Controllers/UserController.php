<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);

        return view('user.index', compact('users'));
    }
    
    public function create()
    {
        return view('user.create');
    }
}
