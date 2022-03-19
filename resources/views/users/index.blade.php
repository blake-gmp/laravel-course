@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista Użytkowników') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Imię</th>
                          <th scope="col">Nazwisko</th>
                          <th scope="col">Numer Telefonu</th>
                          <th scope="col">Email</th>
                          <th scope="col">Akcje</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          <tr>
                          <th scope="row">{{ $user->id }}</th>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->lastname }}</td>
                          <td>{{ $user->phone_number }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                              <a href="{{ route('users.edit', $user->id) }}">
                                  <button class="btn btn-success btn-sm"><i class="far fa-edit"></i> Edytuj</button>
                              </a>
                              <button class="btn btn-danger btn-sm delete" data-id='{{$user->id}}'><i class="fa-solid fa-circle-minus"></i> Usuń</button>
                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
