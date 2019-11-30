<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function homeQuizz()
    {
        return view('quizz');
    }

    public function activeQuizz()
    {
        return view('activeQuizz');
    }

    public function archiveQuizz()
    {
        return view('archiveQuizz');
    }
}
