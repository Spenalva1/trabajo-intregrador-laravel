@extends('layouts.template')

@section('title', 'DHShop - adminMarks')

@section('css')
    {{ '/css/crud.css' }}
@endsection

@section('main')
    <div id="freezeLayer" style="display: none"></div>


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
                <td><button type="submit" mark_id="{{$Mark->id}}" mark_name="{{$Mark->name}}" class="btn btn-outline-secondary btn-delete-confirmation">Eliminar</button></td>
            </tr>
        @endforeach



    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <div class="card crudForm" id="addForm" style="display: none">
        <h1>Formulario de alta de una marca</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="addMark" method="post">
            @csrf
            Marca:
            <br>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            <br>
            <input class="btn btn-success" type="submit" value="Agregar">
            <input class="btn btn-danger" type="button" value="Volver" onclick="location.href='/adminMarks';">
        </form>
    </div>


    {{-- DELETE CONFIRMATION --}}
    <div class="card crudForm" id="deleteFormContainer" style="display:none">
        <h1>Eliminar marca</h1>
        <form id="deleteForm"  method="post">
            @csrf
            <span id="deleteSpan"></span> <br>
            <br>
            <input class="btn btn-success" id="btn-delete" type="submit" value="Eliminar">
            <button class="btn btn-danger" id="btn-back" type="button">Volver</button>
        </form>
    </div>

@endsection

@section('js')
    <script src="/js/delete.js"></script>
    <script src="/js/disableScroll.js"></script>

@endsection


