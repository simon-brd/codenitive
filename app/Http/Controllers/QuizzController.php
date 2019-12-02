<?php

namespace App\Http\Controllers;

use App\Quizz;
use App\UserQuizz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzController extends Controller
{
    public function homeQuizz()
    {
        if (Auth::check()){
            $quizzs = Quizz::all();
            return view('homeQuizz', ['quizzs'=> $quizzs]);
        }
        return view('auth.login');
    }

    public function activeQuizz()
    {
        if (Auth::check()){
            return view('activeQuizz');
        }
        return view('auth.login');
    }

    public function archiveQuizz()
    {
        if (Auth::check()){
            return view('archiveQuizz');
        }
        return view('auth.login');
    }

    // permet d'afficher la partie 'admin' pour la demo
    public function checkView() {
        return view('admin.checkquizz');
    }

    // permet d'effectuer les checks d'iterations
    public function checkIterations()
    {
        $user_quizz = UserQuizz::all();
        foreach ($user_quizz as $oneUserQuizz){
            $quizz = $oneUserQuizz->quizz;
            $user = $oneUserQuizz->user;
            $note = $oneUserQuizz->note;

            $iterations = $oneUserQuizz->iterations;
            $nbIterations = count($iterations);
            $decremeting = [2,1,0.5];

            $limitNote = $quizz->limitNote;

        }
    }

    public function questions($id)
    {
        if (Auth::check()){
            $quizz = Quizz::where('id',$id)->first();
            return view('questions',['questions'=>$quizz->questions()]);
        }
        return view('auth.login');
    }
}
