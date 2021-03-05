<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(int $quiz_id, Request $request)
    {
        $quiz = Quiz::find($quiz_id);
        $questions = $quiz->questions;

        return view('question.index', [
            'quiz' => $quiz,
            'questions' => $questions,
            'message' => $request->session()->get('message')
        ]);
    }

    public function create(int $quiz_id)
    {
        $quiz = Quiz::find($quiz_id);

        return view('question.create', [
            'quiz' => $quiz
        ]);
    }

    public function store(int $quiz_id, Request $request)
    {
        $request->validate([
            'description' => 'required|min:3'
        ]);

        $quiz_id = $quiz_id;
        $description = $request->description;

        $question = new Question();
        $question->quiz_id = $quiz_id;
        $question->description = $description;

        $question->save();

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Pergunta '{$question->description}' cadastrada com sucesso."
        ]);

        return redirect()->route('question', ['quiz_id' => $quiz_id]);
    }

    public function destroy(Request $request)
    {
        $question = Question::find($request->question_id);

        Question::destroy($question->id);

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Pergunta '{$question->description}' deletada com sucesso."
        ]);

        return redirect()->route('question', ['quiz_id' => $request->quiz_id]);
    }
}
