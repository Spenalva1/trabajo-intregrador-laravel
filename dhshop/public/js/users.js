function freeze(){
    freezeLayer.style.display = 'block';
}

function defreeze(){
    freezeLayer.style.display = 'none';
}

document.querySelectorAll('.btn-delete-confirmation').forEach(function(btn){ //boton para mostrar la confirmacion de eliminacion de un usuario
    btn.onclick = function(){
        freeze();
        deleteFormContainer.style.display = 'block'; //muestro la ventana de confirmacion
        let user_id = this.getAttribute('user_id');
        let user_name = this.getAttribute('user_name');
        let form = document.querySelector('#deleteForm');
        let span = document.querySelector('#deleteSpan');
        form.setAttribute('action', 'deleteCustomer/' + user_id);
        span.innerHTML = '¿Seguro desea eliminar el siguiente usuario: ' + user_name + '?';        
    }
});

// botones para cerrar la confirmacion de delete
document.querySelector('#deleteFormContainer .btn-back').onclick = function(){
    deleteFormContainer.style.display = 'none';
    defreeze();
};