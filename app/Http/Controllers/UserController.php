<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index()
{
    $users = user::select('name', 'email', 'password', 'address')->get();
    return view('user.index', compact('users'));
}
}
