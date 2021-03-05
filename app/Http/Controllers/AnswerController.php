<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(int $quiz_id, Request $request)
    {
        $quiz = Quiz::find($quiz_id);
        $questions = $quiz->questions;

        for ($i = 0; $i < count($questions); $i++) {
            $questions[$i]->answers = Answer::query()->where('question_id', $questions[$i]->id)->get();
        }

        return view('answers.index', [
            'quiz' => $quiz,
            'questions' => $questions,
            'message' => $request->session()->get('message')
        ]);
    }

    public function create(int $quiz_id)
    {
        $user_id = Auth::user()->id;

        $quiz = Quiz::find($quiz_id);
        $questions = $quiz->questions;

        for ($i = 0; $i < count($questions); $i++) {
            $questions[$i]->answers = Answer::query()->where('question_id', $questions[$i]->id)->where('user_id', $user_id)->get();
        };

        return view('answers.create', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function store(int $quiz_id, Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $quiz = Quiz::find($quiz_id);

        $answers = $request->input('answer');
        $latitute = $request->latitude;
        $longitude = $request->longitude;

        if (count($answers) > 0) {
            foreach ($answers as $key => $value) {
                if (!empty($value)) {
                    $question_id = $key;
                    $description = $value;

                    $answer = new Answer();
                    $answer->question_id = $question_id;
                    $answer->user_id = Auth::user()->id;
                    $answer->description = $description;
                    $answer->latitude = $latitute;
                    $answer->longitude = $longitude;

                    $answer->save();
                }
            }
        }

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Respostas cadastradas no questionário '{$quiz->title}' com sucesso."
        ]);

        return redirect()->route('quiz');
    }
}
