@extends('layouts.template')

@section('title', 'DHShop - adminCustomers')

@section('css')
    {{ '/css/crud.css' }}
@endsection

@section('main')
    <div id="freezeLayer" style="display: none"></div>
    <h1>Panel de administración de clientes</h1>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    <table class="table table-stripped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>imagen de perfil</th>
                <th>Fecha de nacimiento</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th colspan="2"></th>
              </tr>
        </thead>
    <tbody>
        
        @foreach($Customers as $Customer)

            <tr>
                <td>{{ $Customer->id }}</td>
                <td>{{ $Customer->first_name }}</td>
                <td>{{ $Customer->last_name }}</td>
                <td>{{ $Customer->email }}</td>
                <td><img class="img-fluid img-thumbnail main-image" src="user_img/{{$Customer->image}}" alt=""></td>
                <td>{{ $Customer->birthdate }}</td>
                <td>{{ $Customer->phone }}</td>
                <td>{{ $Customer->address }}</td>
                <td><button user_id="{{$Customer->id}}" user_name="{{$Customer->first_name}} {{$Customer->last_name}}" class="btn btn-outline-secondary btn-delete-confirmation">Eliminar</button></td>
            </tr>

        @endforeach



    </tbody>
    </table>

    <a href="admin" class="btn btn-outline-secondary m-3">Volver a principal</a>

    {{-- DELETE CONFIRMATION --}}
    <div class="card crudForm" id="deleteFormContainer" style="display:none">
        <h2>Eliminar marca</h2>
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
    <script src="/js/users.js"></script>
@endsection