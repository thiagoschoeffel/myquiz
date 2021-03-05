<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $quizzes = Quiz::all();

        for ($i = 0; $i < count($quizzes); $i++) {
            for ($j = 0; $j < count($quizzes[$i]->questions); $j++) {
                for ($k = 0; $k < count($quizzes[$i]->questions[$j]->answers); $k++) {
                    $quizzes[$i]->questions[$j]['answers'] = Answer::query()->where('user_id', Auth::user()->id)->where('question_id', $quizzes[$i]->questions[$j]->answers[$k]->question_id)->get();
                }
            }
        }

        return view('quiz.index', [
            'quizzes' => $quizzes,
            'message' => $request->session()->get('message')
        ]);
    }

    public function create()
    {
        return view('quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $title = $request->title;

        $quiz = new Quiz();
        $quiz->user_id = Auth::user()->id;
        $quiz->title = $title;

        $quiz->save();

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Questionário {$quiz->title} criado com sucesso."
        ]);

        return redirect()->route('quiz');
    }

    public function destroy(Request $request)
    {
        $quiz = Quiz::find($request->quiz_id);

        Quiz::destroy($quiz->id);

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Questionário {$quiz->title} deletado com sucesso."
        ]);

        return redirect()->route('quiz');
    }
}
