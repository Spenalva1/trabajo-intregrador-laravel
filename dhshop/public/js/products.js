let freezeLayer = document.getElementById('freezeLayer');
let deleteFormContainer = document.getElementById('deleteFormContainer');
let addFormContainer = document.getElementById('addFormContainer');
let editFormContainer = document.getElementById('editFormContainer');

let products = [];
document.querySelectorAll('.product_name').forEach(function(product_name){
    products.push(product_name.innerHTML.toLowerCase());
}); //me guardo los productos para validar que una producto ingresado no esté repetida

function freeze(){
    freezeLayer.style.display = 'block';
}


function defreeze(){
    freezeLayer.style.display = 'none';
}

function fileValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;    
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath) || fileInput.value == ''){
        document.getElementById('imageError').innerHTML = 'Se debe subir un archivo .jpeg/.jpg/.png/.gif.';
        fileInput.value = '';
        return true;
    }
    return false;
}

document.querySelectorAll('.btn-delete-confirmation').forEach(function(btn){ //boton para mostrar la confirmacion de eliminacion de un producto
    btn.onclick = function(){
        freeze();
        deleteFormContainer.style.display = 'block'; //muestro la ventana de confirmacion
        let product_id = this.getAttribute('product_id');
        let product_name = this.getAttribute('product_name');
        let form = document.querySelector('#deleteForm');
        let span = document.querySelector('#deleteSpan');
        form.setAttribute('action', 'deleteProduct/' + product_id);
        span.innerHTML = '¿Seguro desea eliminar el siguiente producto: "' + product_name + '"?';        
    }
});

document.getElementById('btn-add-form').onclick = function(){ //boton para mostrar el formulario de alta de una marca
    freeze();
    addFormContainer.style.display = 'block';
}

document.getElementById('addForm').onsubmit = function(e){ //validacion de alta de un producto

    document.querySelectorAll('.error').forEach(function(error){
        error.innerHTML = '';
    });

    let name = this.elements.namedItem('name').value.trim();
    let price = parseInt(this.elements.namedItem('price').value.trim(), 10);
    let stock = parseInt(this.elements.namedItem('stock').value.trim(), 10);
    let description = this.elements.namedItem('description').value.trim();
    let mark_id = this.elements.namedItem('mark_id').value.trim();
    let category_id = this.elements.namedItem('category_id').value.trim();
    let error;

    if(name.length < 3 || name.length > 100 || products.includes(name.toLowerCase())){
        e.preventDefault();
        if(name.length < 3){
            error = 'Deben ingresarse al menos 3 caracteres.'
        }
        if(name.length > 100){
            error = 'Deben ingresarse menos de 100 caracteres.'
        }
        if(products.includes(name.toLowerCase())){
            error = 'El nombre ya se encuentra registrado.'
        }
        document.getElementById('nameError').innerHTML = error;
    }

    if(price < 1){
        e.preventDefault();
        document.getElementById('priceError').innerHTML = 'El precio mínimo es 1.';
    }

    if(stock < 0){
        e.preventDefault();
        document.getElementById('stockError').innerHTML = 'El stock mínimo es 0.';
    }
    
    if(description < 15){
        e.preventDefault();
        document.getElementById('descriptionError').innerHTML = 'Deben ingresarse al menos 15 caracteres.';
    }
    
    if(fileValidation()){
        e.preventDefault();
    }
    
}

// botones para cerrar cada una de las ventanas de crud
document.querySelector('#deleteFormContainer .btn-back').onclick = function(){
    deleteFormContainer.style.display = 'none';
    defreeze();
};

document.querySelector('#addFormContainer .btn-back').onclick = function(){
    addFormContainer.style.display = 'none';
    defreeze();
};

document.querySelector('#editFormContainer .btn-back').onclick = function(){
    editFormContainer.style.display = 'none';
    defreeze();
};
// -----------------------------------------------
