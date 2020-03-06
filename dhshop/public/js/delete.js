let freezeLayer = document.getElementById('freezeLayer');
let deleteFormContainer = document.getElementById('deleteFormContainer');

function freeze(){
    freezeLayer.style.display = 'block';
    disableScroll()
}

function defreeze(){
    freezeLayer.style.display = 'none';
    enableScroll()
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

let deleteBack = document.querySelector('#deleteFormContainer #btn-back');
deleteBack.onclick = function(){
    deleteFormContainer.style.display = 'none';
    defreeze();
};