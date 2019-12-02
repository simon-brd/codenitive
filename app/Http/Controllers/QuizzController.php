<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quizz;
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
        var_dump("ok");
    }

    public function questions($id)
    {
        if (Auth::check()){
            $quizz = Quizz::where('id',$id)->first();
            return view('questions',['questions'=>$quizz->questions(),'quizz'=>$quizz]);
        }
        return view('auth.login');
    }

    public function validateResponses($id, Request $request)
    {
        $quizz = Quizz::where('id',$id)->first();
        $questions = $quizz->questions();
        $response = $request->post();

        foreach ($questions as $question) {
            $answer = new Answer();
            $answer->user_id = Auth::user()->id;
            $answer->question_id = $question->id;
            $answer->userResponse = json_encode($response[$question->id]);
            $answer->save();
        }

        return view('validateQuizz',['quizz'=>$quizz, 'response'=>$response, 'questions'=>$quizz->questions()]);
    }
}
