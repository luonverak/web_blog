<?php

namespace App\Http\Controllers\Blog\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendViewController extends Controller
{
    public function index(){
        return view("blog.frontend.frontend_master");
    }
}
