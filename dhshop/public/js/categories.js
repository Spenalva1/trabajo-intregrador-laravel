let freezeLayer = document.getElementById('freezeLayer');
let deleteFormContainer = document.getElementById('deleteFormContainer');
let addFormContainer = document.getElementById('addFormContainer');
let editFormContainer = document.getElementById('editFormContainer');

let categories = [];
document.querySelectorAll('.category_name').forEach(function(mark_name){
    categories.push(mark_name.innerHTML.toLowerCase());
}); //me guardo las categorias para validar que una categoria ingresada no esté repetida

function freeze(){
    freezeLayer.style.display = 'block';
}

function defreeze(){
    freezeLayer.style.display = 'none';
}

document.querySelectorAll('.btn-delete-confirmation').forEach(function(btn){ //boton para mostrar la confirmacion de eliminacion de una categoria
    btn.onclick = function(){
        freeze();
        deleteFormContainer.style.display = 'block'; //muestro la ventana de confirmacion
        let category_id = this.getAttribute('category_id');
        let category_name = this.getAttribute('category_name');
        let form = document.querySelector('#deleteForm');
        let span = document.querySelector('#deleteSpan');
        form.setAttribute('action', 'deleteCategory/' + category_id);
        span.innerHTML = '¿Seguro desea eliminar la siguiente categoria: ' + category_name + '?';        
    }
});

document.querySelectorAll('.btn-edit-form').forEach(function(btn){ //boton para mostrar el formulario de modificacion de una categoria
    btn.onclick = function(){
        freeze();
        editFormContainer.style.display = 'block';
        let category_id = this.getAttribute('category_id');
        let category_name = this.getAttribute('category_name');
        let form = document.querySelector('#editForm');
        form.setAttribute('action', 'editCategory/' + category_id);
        form.setAttribute('old', category_name);
        form.elements[1].value = category_name;
    }
});

document.getElementById('btn-add-form').onclick = function(){ //boton para mostrar el formulario de alta de una categoria
    freeze();
    addFormContainer.style.display = 'block';
}


// botones para cerrar cada una de las ventanas de crud
document.querySelector('#deleteFormContainer .btn-back').onclick = function(){
    deleteFormContainer.style.display = 'none';
    defreeze();
};

document.querySelector('#addFormContainer .btn-back').onclick = function(){
    addFormContainer.style.display = 'none';
    defreeze();
}
;
document.querySelector('#editFormContainer .btn-back').onclick = function(){
    editFormContainer.style.display = 'none';
    defreeze();
};
// -----------------------------------------------



document.getElementById('addForm').onsubmit = function(e){ //validacion de alta de una categoria

    let value = this.elements[1].value.trim().toLowerCase();
    
    

    if(value.length < 2){
        document.getElementById('addErrorsContainer').style.display = 'block';
        document.getElementById('addError').innerHTML = 'Ingresar un valor de mínimo 2 caracteres.'
        e.preventDefault();
        return;
    }

    if(value.length > 20){
        document.getElementById('addErrorsContainer').style.display = 'block';
        document.getElementById('addError').innerHTML = 'Ingresar un valor de máximo 20 caracteres.'
        e.preventDefault();
        return;
    }
    
    if(categories.includes(value)){
        document.getElementById('addErrorsContainer').style.display = 'block';
        document.getElementById('addError').innerHTML = 'El valor ingresado ya se encuentra registrado.'
        e.preventDefault();
        return;
    }
    
    this.elements[1].value = value;
}

document.getElementById('editForm').onsubmit = function(e){ //validacion de modificacion de una categoria
    let value = this.elements[1].value.trim().toLowerCase();

    if(value.length < 2 ){
        document.getElementById('editErrorsContainer').style.display = 'block';
        document.getElementById('editError').innerHTML = 'Ingresar un valor de mínimo 2 caracteres.'
        e.preventDefault();
        return;
    }

    if(value.length > 20){
        document.getElementById('editErrorsContainer').style.display = 'block';
        document.getElementById('editError').innerHTML = 'Ingresar un valor de máximo 20 caracteres.'
        e.preventDefault();
        return;
    }
    
    if(categories.includes(value) && value != this.getAttribute('old')){
        document.getElementById('editErrorsContainer').style.display = 'block';
        document.getElementById('editError').innerHTML = 'El valor ingresado ya se encuentra registrado.'
        e.preventDefault();
        return;
    }

    this.elements[1].value = value;
}