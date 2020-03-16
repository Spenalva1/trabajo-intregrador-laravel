@extends('layouts.template')

@section('title', 'DHShop - Historial de compras')

@section('main')

<h1>Historial de compras</h1>

<a href="/profile">Volver al perfil</a><br>

@foreach ($Receipts as $Receipt)
    

    <section class="card alert alert-secondary">
        <div>
            <span>Numero de compra: #{{$Receipt->id}}</span>
        </div>
        <div>
            <span>Fecha: {{$Receipt->date}}</span>
        </div>
        <div>
            <span>Productos: </span>
            <ul>
                @foreach ($Receipt->products as $Product)
                <li>{{$Product->pivot->quantity}}x ${{$Product->price}}: {{$Product->name}}.</li>
                @endforeach
            </ul>
        </div>
        <div>
            <span>Total pagado: ${{$Receipt->total}}</span>
        </div>
    </section>

@endforeach


@endsection