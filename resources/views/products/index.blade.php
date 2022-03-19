@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-10">
            <h1><i class="fa-solid fa-clipboard-list"></i> {{ __('products.product.index_title') }}</h1>
        </div>
    <div class="col float-right">
        <a class="float-right" href="{{ route('products.create') }}">
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> {{ __('products.button.add') }}</button>
        </a>
    </div>
    </div>
    <div class="row">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">{{ __('products.product.fields.name') }}</th>
                          <th scope="col">{{ __('products.product.fields.description') }}</th>
                          <th scope="col">{{ __('products.product.fields.amount') }}</th>
                          <th scope="col">{{ __('products.product.fields.price') }}</th>
                            <th scope="col">{{ __('products.product.fields.category') }}</th>
                          <th scope="col">{{ __('products.columns.actions') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($products as $product)
                          <tr>
                          <th scope="row">{{ $product->id }}</th>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->description }}</td>
                          <td>{{ $product->amount }}</td>
                          <td>{{ $product->price }}</td>
                            @if(!is_null($product->category))<td>{{ $product->category->name }}</td>
                              @else <td>Brak</td>
                          @endif
                          <td>
                            <a href="{{ route("products.show", $product->id) }}"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-magnifying-glass"></i> {{ __('products.button.overview') }}</button></a>
                            <a href="{{ route("products.edit", $product->id) }}"><button class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i> {{ __('products.button.edit') }}</button></a>
                              <button class="btn btn-danger btn-sm delete" data-id='{{$product->id}}'><i class="fa-solid fa-circle-minus"></i> {{ __('products.button.remove') }}</button>
                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{ $products->links() }}
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('products') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
