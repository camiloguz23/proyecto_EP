$(document).ready(function () {
    boton_paz = $('#btn_pazysalvo');
    cuadro = $('#cuadro');
    $(cuadro).hide(0);

    $(boton_paz).click(function (e) { 
        $(cuadro).slideToggle(500);
    });
});