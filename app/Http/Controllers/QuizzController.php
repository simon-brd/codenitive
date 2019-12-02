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
            $note = $oneUserQuizz->note;

            $iterations = $oneUserQuizz->iterations;
            $nbIterations = count($iterations);
            $decrementing = [2,1,0.5];

            $limitNote = $quizz->limitNote;

            $newNote = 0;

            switch ($nbIterations){
                case 0: // Première phase d'iterations
                    $newNote = $note - $decrementing[0];
                    break;
                case 1: // Seconde phase d'iterations
                    $newNote = $note - $decrementing[1];
                    break;
                case 2: // Troisième phase d'iterations
                    $newNote = $note - $decrementing[2];
                    break;
                default:
                    $newNote = $note;
                    break;
            }
            $newNote = ($newNote < 0) ? 0 : $newNote;
            $oneUserQuizz->note = $newNote;
            $oneUserQuizz->save();
        }
    }

    public function questions($id)
    {
        if (Auth::check()){
            $quizz = Quizz::where('id',$id)->first();
            return view('questions',['questions'=>$quizz->questions(),'quizz'=>$quizz]);
        }
        return view('auth.login');
    }
}
