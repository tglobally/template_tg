var loading = false;
var pagina = 1;

$( window ).load(function() {
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

const load_contenido = () => {
    console.log("contenido")
};
