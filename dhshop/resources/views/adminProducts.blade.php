@extends('layouts.template')

@section('title', 'DHShop - adminProducts')

@section('css')
    {{ '/css/crud.css' }}
@endsection

@section('main')
    <h1>Panel de administración de productos</h1>

    <div id="freezeLayer" style="display: none"></div>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th colspan="2">
                    <button class="btn btn-dark" id="btn-add-form">agregar</button>
                </th>
            </tr>
        </thead>
    <tbody>
        
        @foreach($Products as $Product)

            <tr>
                <td>{{ $Product->id }}</td>
                <td class="product_name">{{ $Product->name }}</td>
                <td>${{ $Product->price }}</td>
                <td>{{ $Product->stock }}</td>
                <td>{{ $Product->description }}</td>
                <td><img class="img-fluid img-thumbnail main-image" src="product_img/{{$Product->image}}" alt=""></td>
                <td>{{ $Product->mark->name }}</td>
                <td>{{ $Product->category->name }}</td>
                <td><a href="editProduct/{{ $Product->id }}" class="btn btn-outline-secondary">modificar</a></td>
                {{-- <td><a href="deleteProduct/{{ $Product->id }}" class="btn btn-outline-secondary">eliminar</a></td> --}}
                {{-- <td><form action="deleteProduct/{{ $Product->id }}" type="productos" name="{{$Product->name}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary">Eliminar</button>
                </form></td> --}}
                <td><button product_id="{{$Product->id}}" product_name="{{$Product->name}}" class="btn btn-outline-secondary btn-delete-confirmation">Eliminar</button></td>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>



    @extends('addProduct')
    @extends('deleteProduct')

@endsection

@section('js')
    <script src="/js/products.js"></script>
@endsection