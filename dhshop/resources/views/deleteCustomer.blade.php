@extends('layouts.template')

@section('title', 'DHShop - adminCustomers')

@section('main')

<br>
<h1>Eliminar cliente</h1>
<form action="" method="POST">
    @csrf
    ¿Seguro desea eliminar el siguiente cliente: {{$Customer->first_name . " " . $Customer->last_name . " (id: " . $Customer->id . ")"}} ? <br>
    <input class="btn btn-success" type="submit" value="Eliminar">
    <a class="btn btn-danger" type="button" href='/adminCustomers'>Volver</a>
</form>

@endsection