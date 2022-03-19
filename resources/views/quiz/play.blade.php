@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-2 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>Quiz z języka angielskiego</h4><span>({{ $quizzes->currentPage() }} z {{ $quizzes->lastPage() }})</span>
                        </div>
                    </div>
                    @foreach($quizzes as $quiz)
                    <div id="quiz-wrapper">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h5 class="mt-1 ml-2">Słowo: {{ $quiz->englishName }}</h5>
                        </div>

                         <input type="radio" class="chosen-answer" id="wronganswera" name="wronganswera" data-id="{{ $quiz->id }}" value="{{ $quiz->wrongAnswerA }}">
                         <label for="wronganswera">{{ $quiz->wrongAnswerA }}</label><br>

                         <input type="radio" class="chosen-answer" id="wronganswerb" name="wronganswera" data-id="{{ $quiz->id }}" value="{{ $quiz->wrongAnswerB }}">
                         <label for="wronganswerb">{{ $quiz->wrongAnswerB }}</label><br>

                         <input type="radio" class="chosen-answer" id="wronganswerc" name="wronganswera" data-id="{{ $quiz->id }}" value="{{ $quiz->wrongAnswerC }}">
                         <label for="wronganswerc">{{ $quiz->wrongAnswerC }}</label>
                    </div>
                        </div>
                    @endforeach
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <a href="{{ route('quiz.index') }}" class="btn btn-primary d-flex align-items-center btn-danger" type="button"><i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp; Zakończ</a>
                        @if($quizzes->currentPage() == $quizzes->lastPage())
                            <a href="{{ route('quiz.index') }}" class="btn btn-primary border-success align-items-center btn-success" type="button">Zakończ <i class="fa fa-angle-right ml-2"></i></a></div>
                        @else
                            <a href="{{ $quizzes->nextPageUrl() }}" class="btn btn-primary border-success align-items-center btn-success" type="button">dalej <i class="fa fa-angle-right ml-2"></i></a></div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    const QUIZ_DATA = {
    sendAnswer: '{{ url('quiz') }}/'
    }
@endsection
@section('js-files')
    <script src="{{ asset('js/quiz.js') }}"></script>
@endsection

