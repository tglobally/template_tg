var loading = false;
var pagina = 1;

let seccion = getParameterByName('seccion');
const ruta_load = get_url(seccion, "load_table", {});

$(window).load(function () {
    console.log(ruta_load)

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
            console.log(response)

            if (response.status === 'Success') {
                $('#load').html(response.html);
            } else if (response.status === 'Error') {
                alert("Ha ocurrido un error: " + response.message);
            } else {
                console.log(response)
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            let response = XMLHttpRequest.responseText;
            response = response.replace('[]', '')

            if (response.includes('Acceso denegado')) {
                const html = `<div class="col-md-9 info-lista" style="margin-top: 20px;"><div class="row-cols-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh error!</strong> Acceso denegado - No cuenta con los permisos necesarios para la ruta: <strong>(${ruta_load})</strong>.
                                </div>
                              </div></div>`;

                $('#load').html(html);
            } else {
                alert("Ha ocurrido un error: " + textStatus);
            }
        }
    });
};
