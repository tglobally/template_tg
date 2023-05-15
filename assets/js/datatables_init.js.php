let url_data_table = $(location).attr('href') + "&ws=1";

datatable = function (identificador, columns, columnDefs, data, filtro_in) {

    let seccion = getParameterByName('seccion');
    let accion = getParameterByName('accion');

    url_data_table = url_data_table.replace(accion, "get_data");

    if (identificador !== ".datatable") {
        let _seccion = identificador.slice(1)
        url_data_table = url_data_table.replace(seccion, _seccion);
    }

    let _columns = asigna_columns(columns);
    let _columnDefs = asigna_columnDefs(columnDefs);

    var table = $(identificador).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            "url": url_data_table,
            'data': {data: data, in: filtro_in},
            "error": function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseText;
                document.body.innerHTML = response.replace('[]', '')
            }
        },
        columns: _columns,
        columnDefs: _columnDefs,
        'select': {
            'style': 'multi'
        },
        'order': [[1, 'asc']]
    });
};

asigna_columns = function (columns) {
    let salida = []

    columns.forEach(function (valor, indice, array) {

        if (valor.data === "check"){
            valor.data = null;
        }

        salida.push(valor);
    });

    return salida;
};

asigna_columnDefs = function (columnDefs) {
    let salida = []

    columnDefs.forEach(function (object, indice, array) {

        object.render = function (data, type, row) {
            let expresion = "";
            let objects = object.rendered

            if (object.type === "text") {
                objects.forEach(function (e) {
                    expresion += row[e] + " "
                })
            } else if (object.type === "button") {
                objects.forEach(function (e) {
                    let button = `${row[e]}`;
                    expresion += button
                })
            } else if (object.type === "menu") {
                var item = "";

                objects.forEach(function (e) {
                    let button = `${row[e]}`;
                    item += button
                })

                var menu = `<div class="dropdown">`;
                menu += `<span id="dropdownMenu" class="dropdown-toggle badge badge-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</span>`;
                //menu += `<div id="dropdownMenu" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</div>`;
                menu += `<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">`;
                menu += `<div class="dropdown-menu-inner" style="display: flex; flex-direction: column; gap: 3px; padding: 10px;">`;
                menu += item;
                menu += `</div></div></div>`;

                expresion = menu;
            }
            return expresion;
        }

        if (object.type === "check") {
            delete object.render
            delete object.className
            delete object.defaultContent
            delete object.orderable
            delete object.rendered
            delete object.data

            object.checkboxes = {'selectRow': true}
        }

        salida.push(object);
    });
    return salida;
};
