var loading = false;
var pagina = 1;

$(window).load(function () {
    load_contenido();
});

$(window).scroll(function () {
    if (Math.round($(this).scrollTop()) >= $(document).height() - $(window).height()) {
        if (loading == false) {
            loading = true;
            pagina++;
            load_contenido();
        }
    }
});

$('#search').keyup(
    delay(function (e) {
        pagina = 1;
        load_contenido();
    }, 500)
);

const load_contenido = () => {
    let search = $('#search').val();
    var dataform = new FormData();

    dataform.append('search', search);
    dataform.append('estado', true);
    dataform.append('pagina', pagina);

    $.ajax({
        async: true,
        type: 'POST',
        url: ruta_load,
        data: dataform,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === 'Success') {
                $('#load').html(response.html);
            } else if (response.status === 'Error') {
                alert("Ha ocurrido un error: " + response.message);
            }
        },
    });
};
