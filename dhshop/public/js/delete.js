let freezeLayer = document.getElementById('freezeLayer');
let deleteFormContainer = document.getElementById('deleteFormContainer');
let addFormContainer = document.getElementById('addFormContainer');
let editFormContainer = document.getElementById('editFormContainer');

let marks = [];
document.querySelectorAll('.mark_name').forEach(function(mark_name){
    marks.push(mark_name.innerHTML);
}); //si lo cambian desde el inspector se puede esquivar la validacion

function freeze(){
    freezeLayer.style.display = 'block';
}

function defreeze(){
    freezeLayer.style.display = 'none';
}

document.querySelectorAll('.btn-delete-confirmation').forEach(function(btn){
    btn.onclick = function(){
        freeze();
        deleteFormContainer.style.display = 'block';
        let mark_id = this.getAttribute('mark_id');
        let mark_name = this.getAttribute('mark_name');
        let form = document.querySelector('#deleteForm');
        let span = document.querySelector('#deleteSpan');
        form.setAttribute('action', 'deleteMark/' + mark_id);
        span.innerHTML = '¿Seguro desea eliminar la siguiente marca: ' + mark_name + '?';        
    }
});

document.querySelectorAll('.btn-edit-form').forEach(function(btn){
    btn.onclick = function(){
        freeze();
        editFormContainer.style.display = 'block';
        let mark_id = this.getAttribute('mark_id');
        let mark_name = this.getAttribute('mark_name');
        let form = document.querySelector('#editForm');
        form.setAttribute('action', 'editMark/' + mark_id);
        form.setAttribute('old', mark_name);
        form.elements[1].value = mark_name;
    }
});

document.getElementById('btn-add-form').onclick = function(){
    freeze();
    addFormContainer.style.display = 'block';
}

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

document.getElementById('addForm').onsubmit = function(e){

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
    
    if(marks.includes(value)){
        document.getElementById('addErrorsContainer').style.display = 'block';
        document.getElementById('addError').innerHTML = 'El valor ingresado ya se encuentra registrado.'
        e.preventDefault();
        return;
    }

    this.elements[1].value = value;
}

document.getElementById('editForm').onsubmit = function(e){
    let value = this.elements[1].value.trim().toLowerCase();

    if(value.length < 2 ){
        document.getElementById('editErrorsContainer').style.display = 'block';
        document.getElementById('editError').innerHTML = 'Ingresar un var de mínimo 2 caracteres.'
        e.preventDefault();
        return;
    }

    if(value.length > 20){
        document.getElementById('editErrorsContainer').style.display = 'block';
        document.getElementById('editError').innerHTML = 'Ingresar un valor de máximo 20 caracteres.'
        e.preventDefault();
        return;
    }
    
    if(marks.includes(value) && value != this.getAttribute('old')){
        document.getElementById('editErrorsContainer').style.display = 'block';
        document.getElementById('editError').innerHTML = 'El valor ingresado ya se encuentra registrado.'
        e.preventDefault();
        return;
    }
    
    this.elements[1].value = value;
}