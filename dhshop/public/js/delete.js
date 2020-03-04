document.querySelectorAll('form').forEach(function(form){
    form.onsubmit = function(e){
        if(!confirm('¿Seguro que desea eliminar el siguiente registro "' + this.getAttribute('name') + '" perteneciente a ' + this.getAttribute('type') + '?')){
            e.preventDefault();
        }
    }
});
