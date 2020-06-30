<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionaire $questionaire)
    {
        return view('question.create', compact('questionaire'));
    }

    public function store(Request $request, Questionaire $questionaire)
    {
        // dd(request()->all());
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);
        //uninjected request is just an helper function. can be used only in get request
        // dd($questionaire);
        //i should use the injected request for anything other than get request

        $question = $questionaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);
        return redirect('/questionaires/' . $questionaire->id);
    }

    public function destroy(Questionaire $questionaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionaire->path());
    }
}
