function mostrarEditarDados(e) {

    $(document).ready(function () {
        $('#modal-dados').modal('show');
    });
}

function mostrarAlterarFoto(e) {

    $(document).ready(function () {
        $('#modal-foto').modal('show');
    });
}

let alterarFoto = document.getElementById('btn-perfil-foto');

alterarFoto.addEventListener("click", function () {
    function openModal() {
        document.getElementById("modal-foto").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modal-foto").style.display = "none";
    }


});


let editarDados = document.getElementById('btn-perfil-dados');

editarDados.addEventListener("click", function () {
    function openModal() {
        document.getElementById("modal-dados").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modal-dados").style.display = "none";
    }


});


