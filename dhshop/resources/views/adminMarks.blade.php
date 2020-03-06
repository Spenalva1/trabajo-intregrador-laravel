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
                <button class="btn btn-dark" id="btn-add-form">agregar</button>
            </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($Marks as $Mark)

                <tr>
                    <td>{{ $Mark->id }}</td>
                    <td class="mark_name">{{ $Mark->name }}</td>
                    <td><a href="editMark/{{ $Mark->id }}" class="btn btn-outline-secondary">modificar</a></td>
                    <td><button mark_id="{{$Mark->id}}" mark_name="{{$Mark->name}}" class="btn btn-outline-secondary btn-delete-confirmation">Eliminar</button></td>
                </tr>

            @endforeach

        </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>


    {{-- ADD FORM --}}
    <div class="card crudForm" id="addFormContainer" style="display: none">
        <h1>Formulario de alta de una marca</h1>


        {{-- muestra de errores con validacion de laravel --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}} 

        <div class="alert alert-danger" id="addErrorsContainer" style="display: none">
            <span id="addError"></span>
        </div>



        <form action="/addMark" id="addForm" method="post">
            @csrf
            Marca:
            <br>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            <br>
            <input class="btn btn-success" id="btn-add" type="submit" value="Agregar">
            <button class="btn btn-danger btn-back" type="button">Volver</button>
        </form>
    </div>
    {{-- ----------------- --}}


    {{-- DELETE CONFIRMATION --}}
    <div class="card crudForm" id="deleteFormContainer" style="display:none">
        <h1>Eliminar marca</h1>
        <form id="deleteForm"  method="post">
            @csrf
            <span id="deleteSpan"></span> <br>
            <br>
            <input class="btn btn-success" id="btn-delete" type="submit" value="Eliminar">
            <button class="btn btn-danger btn-back" type="button">Volver</button>
        </form>
    </div>
    {{-- ----------------- --}}


@endsection

@section('js')
    <script src="/js/delete.js"></script>
@endsection


