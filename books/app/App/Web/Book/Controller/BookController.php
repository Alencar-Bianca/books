<?php

namespace App\Web\Book\Controller;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $tasks = app(Task::class)->get();

        return view('createUser', compact('tasks'));
    }
    public function store(){}
}
