<?php

namespace App\Http\Controllers\Blog\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendViewController extends Controller
{
    public function index(){
        return view("blog.backend.index");
    }
    public function category(){
        return view("blog.backend.category.category_page");
    }
}
