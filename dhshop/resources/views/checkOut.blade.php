@extends('layouts.template')

@section('title', 'DHShop - Carrito')

@section('css')
    {{ '/css/cart.css' }}
@endsection


@section('main')
    <section class="card alert alert-success">
        <h1 class="m-auto">Compra relizada con éxito</h1>
        <div>
            <span>Numero de compra: #{{$purchaseNumber}}</span>
        </div>
        <div>
            <span>Fecha: {{$date}}</span>
        </div>
        <div>
            <span>Productos: </span>
            <ul>
                @foreach ($Products as $Product)
                    <li>{{$Product->pivot->quantity}}x ${{$Product->price}}: {{$Product->name}}.</li>
                @endforeach
            </ul>
        </div>
        <div>
            <span>Total pagado: ${{$totalPrice}}</span>
        </div>
    </section>
@endsection