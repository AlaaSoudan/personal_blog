<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        dd(Category::first()->articles);
    }
}
