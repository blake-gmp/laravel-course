@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodawanie nowego słowa</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('quiz.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="englishName" class="col-md-4 col-form-label text-md-end">Słowo kluczowe</label>

                            <div class="col-md-6">
                                <input id="englishName" type="text" maxlength="150" class="form-control @error('englishName') is-invalid @enderror" name="englishName" required autofocus>

                                @error('englishName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="correctAnswer" class="col-md-4 col-form-label text-md-end">Błędna/Poprawna odpowiedź</label>

                            <div class="col-md-6">
                                <input id="correctAnswer" type="text" maxlength="50" class="form-control @error('correctAnswer') is-invalid @enderror" name="correctAnswer" required autofocus>

                                @error('correctAnswer')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wrongAnswerA" class="col-md-4 col-form-label text-md-end">Błędna/Poprawna odpowiedź 1</label>

                            <div class="col-md-6">
                                <input id="wrongAnswerA" type="text" maxlength="50" class="form-control @error('wrongAnswerA') is-invalid @enderror" name="wrongAnswerA" required autofocus>

                                @error('wrongAnswerA')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wrongAnswerB" class="col-md-4 col-form-label text-md-end">Błędna/Poprawna odpowiedź 2</label>

                            <div class="col-md-6">
                                <input id="wrongAnswerB" type="text" maxlength="50" class="form-control @error('wrongAnswerB') is-invalid @enderror" name="wrongAnswerB" required autofocus>

                                @error('wrongAnswerB')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wrongAnswerC" class="col-md-4 col-form-label text-md-end">Błędna/Poprawna odpowiedź 3</label>

                            <div class="col-md-6">
                                <input id="wrongAnswerC" type="text" maxlength="50" class="form-control @error('wrongAnswerC') is-invalid @enderror" name="wrongAnswerC" required autofocus>

                                @error('wrongAnswerC')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('products.button.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
