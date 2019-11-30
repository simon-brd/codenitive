<?php

namespace App\Http\Controllers;

use App\Quizz;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function homeQuizz()
    {
        $quizzs = Quizz::all();
        return view('quizz', ['quizzs'=> $quizzs]);
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
