<?php

namespace App\Http\Controllers\Blog\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index()  {
        return view("blog.user.index");
    }
}
