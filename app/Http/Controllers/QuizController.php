<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Models\Quiz;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view("quiz.index", [
            'quizzes' => Quiz::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view("quiz.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreQuizRequest $request)
    {
        $quiz = new Quiz($request->validated());
        $quiz->save();

        return redirect(route('quiz.index'))->with('status', "Poprawnie dodano nowy quiz!");
    }

    public function play(): View
    {
        return view("quiz.play", [
            'quizzes' => Quiz::paginate(1)
        ]);
    }

    public function verification($_quiz, $answer) : JsonResponse
    {
        $quiz = Quiz::find($_quiz);
        try {
            if($quiz->correctAnswer == $answer)
                return response()->json([
                    'status' => 'correct',
                    'checked' => $quiz->correctAnswer,
                    'data' => $quiz
                ]);
            else
                return response()->json([
                    'status' => 'wrong',
                    'checked' => $quiz->correctAnswer,
                    'data' => $quiz
                ]);

        } catch(Exception $e) {
            return response()->json([
                'status' => 'error'
            ])->setStatusCode(500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz) : View
    {
        return view('quiz.edit', [
            'quiz' => $quiz,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreQuizRequest $request, Quiz $quiz)
    {
        $quiz->fill($request->validated());
        $quiz->save();

        return redirect(route('quiz.index'))->with('status', "Poprawnie zedytowano quiz.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz) : JsonResponse
    {
        try {
            $quiz->delete();
            Session::flash('status', "Poprawnie usunięto rekord z quizu.");
            return response()->json();
        } catch(Exception $e) {
            return response()->json([
                'message' => 'Żadne dane nie zostały zmodyfikowane.',
                'result' => 'Anulowano!',
                'status' => 'error'
            ])->setStatusCode(500);
        }
    }
}
