<div class="card crudForm overflow-auto" id="addFormContainer" style="display: none">

    <h2>Formulario de alta de un producto</h2>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    <form id="addForm" action="/addProduct" method="post" enctype="multipart/form-data">
        @csrf
        Nombre:
        <input value="" class="form-control" type="text" name="name" class="form-control" require>
        <div class='invalid-feedback error' id="nameError" style='display: block'></div>
        <br>


        Precio:
        <input value="0" type="number" name="price" class="form-control" require>
        <div class='invalid-feedback error' id="priceError" style='display: block'></div>
        <br>



        Stock:
        <input value="0" type="number" name="stock" class="form-control" require>
        <div class='invalid-feedback error' id="stockError" style='display: block'></div>
        <br>



        Descripción:
        <textarea cols="30" rows="3" value="{{old('description')}}" type="textarea" name="description" class="form-control" require></textarea>
        <div class='invalid-feedback error' id="descriptionError" style='display: block'></div>
        <br>



        Imagen:
        <input class="from-control" type="file" id="image" name="image" require>
        <div class='invalid-feedback error' id="imageError" style='display: block'></div>
        <br> <br>



        Categoría:
        <select name="category_id" class="form-control">
            @foreach ($Categories as $Category)
                @if(old('category_id') == $Category->id)
                    <option value="{{$Category->id}}" selected>{{$Category->name}}</option>
                @else
                    <option value="{{$Category->id}}">{{$Category->name}}</option>  
                @endif
            @endforeach
        </select>
        <br>

        Marca:
        <select name="mark_id" class="form-control">
            @foreach ($Marks as $Mark)
                @if(old('mark_id') == $Mark->id)
                    <option value="{{$Mark->id}}" selected>{{$Mark->name}}</option>
                @else
                    <option value="{{$Mark->id}}">{{$Mark->name}}</option>  
                @endif
            @endforeach
        </select>
        <br>






        <input class="btn btn-success" type="submit" value="Agregar">
        <button class="btn btn-danger btn-back" type="button">Volver</button>
        <br> <br>
    </form>
</div>