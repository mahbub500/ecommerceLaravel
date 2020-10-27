<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
    	// return User::all();
        return view('admin.dashboard.index');
    }
}
