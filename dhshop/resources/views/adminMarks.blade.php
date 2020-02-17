@extends('layouts.template')

@section('title', 'DHShop - adminMarks')

@section('main')
    <h1>Panel de administración de Marcas</h1>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th>id</th>
        <th>Marca</th>
        <th colspan="2">
            <a href="addMark" class="btn btn-dark">
            agregar
            </a>
        </th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($Marks as $Mark)

            <tr>
                <td>{{ $Mark->id }}</td>
                <td>{{ $Mark->name }}</td>
                <td><a href="editMark/{{ $Mark->id }}" class="btn btn-outline-secondary">modificar</a></td>
                <td><a href="deleteMark/{{ $Mark->id }}" class="btn btn-outline-secondary">eliminar</a></td>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>
@endsection