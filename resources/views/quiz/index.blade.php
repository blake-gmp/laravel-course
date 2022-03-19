@extends('layouts.app')

@section('content')
    <div class="container">
        @include('helpers.flash-messages')
        <div class="row">
            <div class="col-10">
                <h1><i class="fa-solid fa-square-pen"></i> Quiz</h1>
            </div>
            <div class="col float-right">
                <a class="float-right" href="{{ route('quiz.create') }}">
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Dodaj</button>
                </a>
                <a class="float-right" href="{{ route('quiz.play') }}">
                    <button type="button" class="btn btn-success"><i class="fa-solid fa-gamepad"></i> Graj</button>
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Słowo kluczowe</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
               <tbody>
                 @foreach($quizzes as $quiz)
                    <tr>
                        <th scope="row">{{ $quiz->id }}</th>
                        <td>{{ $quiz->englishName }}</td>
                        <td>
                            <a href="{{ route("quiz.edit", $quiz->id) }}"><button class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i> Edytuj</button></a>
                            <button class="btn btn-danger btn-sm delete" data-id='{{$quiz->id}}'><i class="fa-solid fa-circle-minus"></i> Usuń</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
        @section('javascript')
            const deleteUrl = "{{ url('quiz') }}/";
        @endsection
        @section('js-files')
            <script src="{{ asset('js/delete.js') }}"></script>
@endsection

