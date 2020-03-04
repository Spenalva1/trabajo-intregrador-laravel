@extends('layouts.template')

@section('title', 'DHShop - adminCategories')

@section('main')
    <h1>Panel de administración de categorías</h1>

    <a href="/admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th>id</th>
        <th>Categoría</th>
        <th colspan="2">
            <a href="addCategory" class="btn btn-dark">
            agregar
            </a>
        </th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($Categories as $Category)

            <tr>
                <td>{{ $Category->id }}</td>
                <td>{{ $Category->name }}</td>
                <td><a href="editCategory/{{ $Category->id }}" class="btn btn-outline-secondary">modificar</a></td>
                {{-- <td><a href="deleteCategory/{{ $Category->id }}" class="btn btn-outline-secondary">eliminar</a></td> --}}
                <td><form action="deleteCategory/{{ $Category->id }}" type="categorías" name="{{$Category->name}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary">Eliminar</button>
                </form></td>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="/admin" class="btn btn-outline-secondary m-3">Volver a principal</a>
@endsection

@section('js')
    <script src="/js/delete.js"></script>
@endsection