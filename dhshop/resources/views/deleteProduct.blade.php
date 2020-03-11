<div class="card crudForm" id="deleteFormContainer" style="display: none">
    <h2>Eliminar producto</h2>
    <form id="deleteForm" method="POST">
        <span id="deleteSpan"></span> <br>
        @csrf
        <input class="btn btn-success" type="submit" value="Eliminar">
        <button class="btn btn-danger btn-back" type="button">Volver</button>
    </form>
</div>