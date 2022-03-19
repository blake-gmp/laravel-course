@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-10">
            <h1><i class="fa-solid fa-clipboard-list"></i> Zamówienia</h1>
        </div>
    </div>
    <div class="row">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                            <th scope="col">Ilość</th>
                            <th scope="col">Cena [PLN]</th>
                            <th scope="col">Produkty</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($orders as $order)
                          <tr>
                          <td>{{ $order->id }}</td>
                              <td>{{ $order->quantity }}</td>
                              <td>{{ $order->price }}</td>
                              <td>{{ $order->id }}</td>
                              <td>
                              @foreach($order->products as $product)
                                  <ul>
                                      <li>{{ $product->name }} - {{ $product->description }}</li>
                                  </ul>
                              @endforeach
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{ $orders->links() }}
</div>
@endsection
