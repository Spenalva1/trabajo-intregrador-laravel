@extends('layouts.template')

@section('title', 'DHShop - contacto')

@section('css')
    {{ '/css/products.css' }}
@endsection


@section('main')

<h2>PRODUCTOS</h2>

    @if(!$Products->count())
        <div class="alert alert-danger text-left"> No se encontraron productos para la busqueda de: "{{$search}}". </div>
    @else
        @isset($search)
            <div class="alert alert-primary text-left"> Mostrando resultados para: "{{$search}}" ({{$quantity}}). </div>
        @endisset
    @endif
    

    <section class="row products-list">

    @foreach ($Products as $Product)
        <div class="product-container col-12 col-md-4 col-lg-3">
            <a href="products/{{$Product->id}}" class="product">
                <img class="img-fluid img-thumbnail" src="/product_img/{{$Product->image}}" alt="">
                <h3 class="product-name">{{$Product->name}}</h3>
                <span class="product-price">${{$Product->price}}</span>
            </a>
        </div>
    @endforeach

    </section>

@endsection