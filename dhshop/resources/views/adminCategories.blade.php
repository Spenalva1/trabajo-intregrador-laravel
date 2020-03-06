@extends('layouts.template')

@section('title', 'DHShop - adminCategories')

@section('css')
    {{ '/css/crud.css' }}
@endsection

@section('main')
    <div id="freezeLayer" style="display: none"></div>
    <h1>Panel de administración de categorías</h1>

    <a href="/admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th>id</th>
        <th>Categoría</th>
        <th colspan="2">
            <button class="btn btn-dark" id="btn-add-form">agregar</button>
        </th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($Categories as $Category)

            <tr>
                <td>{{ $Category->id }}</td>
                <td class="category_name">{{ ucfirst(trans($Category->name)) }}</td>
                <td><button category_id="{{$Category->id}}" category_name="{{$Category->name}}" class="btn btn-outline-secondary btn-edit-form">modificar</button></td>
                <td><button category_id="{{$Category->id}}" category_name="{{$Category->name}}" class="btn btn-outline-secondary btn-delete-confirmation">Eliminar</button></td>
            </tr>

        @endforeach



    </tbody>
    </table>

    <a href="/admin" class="btn btn-outline-secondary m-3">Volver a principal</a>
    
    
    {{-- ADD FORM --}}
    <div class="card crudForm" id="addFormContainer" style="display: none">
        <h2>Formulario de alta de una categoría</h2>

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

        <form action="/addCategory" id="addForm" method="post">
            @csrf
            Categoría:
            <br>
            <input type="text" name="name" class="form-control">
            <br>
            <input class="btn btn-success" id="btn-add" type="submit" value="Agregar">
            <button class="btn btn-danger btn-back" type="button">Volver</button>
        </form>
    </div>
    {{-- ----------------- --}}


    {{-- DELETE CONFIRMATION --}}
    <div class="card crudForm" id="deleteFormContainer" style="display:none">
        <h2>Eliminar categoría</h2>
        <form id="deleteForm"  method="post">
            @csrf
            <span id="deleteSpan"></span> <br>
            <br>
            <input class="btn btn-success" id="btn-delete" type="submit" value="Eliminar">
            <button class="btn btn-danger btn-back" type="button">Volver</button>
        </form>
    </div>
    {{-- ----------------- --}}



    {{-- EDIT FORM --}}
    <div class="card crudForm" id="editFormContainer" style="display:none">
        <h2>Formulario de modificación de una categoría</h2>

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

        <div class="alert alert-danger" id="editErrorsContainer" style="display: none">
            <span id="editError"></span>
        </div>

        <form id="editForm" method="post">
            @csrf
            Categoría:
            <br>
            <input type="text" name="name" class="form-control" value="">
            <br>
            <input class="btn btn-success" id="btn-edit" type="submit" value="Modificar">
            <button class="btn btn-danger btn-back" type="button">Volver</button>
        </form>
    </div>
    {{-- ----------------- --}}

@endsection

@section('js')
    <script src="/js/categories.js"></script>
@endsection