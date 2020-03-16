@extends('layouts.template')

@section('title', 'DHShop - adminSales')

@section('main')
    <h1>Panel de administración de productos</h1>

    <div id="freezeLayer" style="display: none"></div>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Numero de compra</th>
                <th>Fecha</th>
                <th>Comprador</th>
                <th>Products</th>
                <th>Total</th>
            </tr>
        </thead>
    <tbody>
        
        @foreach($Receipts as $Receipt)

            <tr>
                <th>{{$Receipt->id}}</th>
                <th>{{$Receipt->date}}</th>
                <th>{{$Receipt->user->first_name}} {{$Receipt->user->last_name}} (id: {{$Receipt->user->id}})</th>
                <th><ul>
                    @foreach ($Receipt->products as $Product)
                        <li>{{$Product->pivot->quantity}}x ${{$Product->price}}: {{$Product->name}}.</li>
                    @endforeach
                </ul></th>
                <th>{{$Receipt->total}}</th>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

@endsection