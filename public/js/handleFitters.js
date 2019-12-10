function limpiarOpcionesFitter(){
    console.log('LIMPIAR OPCIONES FITTER');
    $('#selectEmpleadosFitter option').remove();
}

function anadirDefaultAOpcionesFitter(){

    $('#selectEmpleadosFitter').append(`
        <option value="">
            Todos
        </option>
    `);
}

function anadirEmpleadoAOpcionesFitter(empleado){

    $('#selectEmpleadosFitter').append(`
        <option value="${empleado.id}">
            ${empleado.nombre} ${empleado.appaterno} ${empleado.apmaterno}
        </option>
    `);

}

function actualizarOpcionesFitters(OFICINA_ID){

    const URL_REQUEST = window.location.origin+`/api/empleados/fitters/${OFICINA_ID}`;

    $.ajax({
        url: URL_REQUEST,
    }).done(function(empleadosFitter){
        
        limpiarOpcionesFitter();
        anadirDefaultAOpcionesFitter();
        empleadosFitter.forEach(function(empleado){
            anadirEmpleadoAOpcionesFitter(empleado);
        });

    });

}

function mostrarCamposMetaFitter(){
    $('#contenedorMetasFitter').show('slow');
}

function esconderCamposMetaFitter(){
    $('#contenedorMetasFitter').hide('slow');
}