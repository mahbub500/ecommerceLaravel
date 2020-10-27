<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    	return view('website.blog');
    }
    public function show()
    {
    	return view('website.blog-single');
    }
}
