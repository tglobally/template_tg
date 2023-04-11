var loading = false;
var pagina = 1;
var search = "";


let seccion = getParameterByName('seccion');
const ruta_load = get_url(seccion, "load_table", {});

const load_contenido = () => {
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
                if (pagina == 1){
                    $('#load-table').html(response.html);
                    $('#search').val(search)
                } else {
                    $('#load-table table tbody').append(response.html);
                }

            } else if (response.status === 'Error') {
                alert("Ha ocurrido un error: " + response.message);
            } else {
                console.log(response)
            }


            if ($('#search').val() != '') {
                loading = true;
            } else  {
                loading = false;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            let response = XMLHttpRequest.responseText;
            response = response.replace('[]', '')

            if (response.includes('Acceso denegado')) {
                const html = `<div class="col-md-12 info-lista" style="margin-top: 20px;"><div class="row-cols-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh error!</strong> Acceso denegado - No cuenta con los permisos necesarios para la ruta: <strong>(${ruta_load})</strong>.
                                </div>
                              </div></div>`;

                $('#load-table').html(html);
            } else {
                alert("Ha ocurrido un error: " + textStatus);
            }
        }
    });
};

const load_loader = (screen) => {
    $(document).ajaxStart(function () {
        screen.fadeIn();
    }).ajaxStop(function () {
        screen.fadeOut();

        $('#search').keyup(
            delay(function (e) {
                pagina = 1;
                search = $(this).val();
                load_contenido();
            }, 500)
        );
    })
}

$(window).load(function () {
    $('#load-table')
        .addClass('col-md-9')
        .css({"display":"flex","justify-content":"center"})
        .append(`<div id="loader" class="loadingio-spinner-spinner-fbpis5xeagh" style="display: none;">
        <div class="ldio-kjp6horjcfr">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        </div>
        </div>`);

    let screen = $('#loader');
    load_loader(screen);

    load_contenido();
});

$(window).scroll(function () {
    if (Math.round($(this).scrollTop()) >= $(document).height() - $(window).height()) {
        if (loading == false) {
            loading = true;
            pagina++;

            $( "#loader" ).remove();

            $('#load-table #table-load')
                .append(`<div id="loader" class="loadingio-spinner-spinner-fbpis5xeagh" >
        <div class="ldio-kjp6horjcfr">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        </div>
        </div>`);

            let screen = $('#loader');
            load_loader(screen);
            load_contenido();
        }
    }
});




