/**
 * Created by juank on 14/05/2017.
 */

/*function editarPregunta(pregunta_id) {
    var parametros = {
        'idPregunta': pregunta_id,
    };
    var ruta = '/quiz_preguta_informaion';
    $.ajax({
        url: ruta,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function (data) {
            console.log(data);
        }
    });
}*/


function tipo_respuestas() {
    tiporespuesta =$('#tipo_respuesta').val();

    if (tiporespuesta === '1'){
        $('#respuestas').html('<label></label><textarea class="form-control" placeholder="Aqui ira la respuesta" disabled></textarea>');
    }else{
        $('#respuestas').html('<div class="form-group">' +
            '<label>1 respuesta</label>' +
            '<input class="form-control"  name="option1" placeholder="1 respuesta">' +
            '<label class="checkbox-inline">\n' +
            '  <input type="checkbox" id="inlineCheckbox1" name="verdadero1" value="1"> ¿Verdadera?\n' +
            '</label>' +
            '</div>' +
            '<div class="form-group">' +
            '<label>2 respuesta</label>' +
            '<input class="form-control"   name="option2"  placeholder="2 respuesta">' +
            '<label class="checkbox-inline">\n' +
            '  <input type="checkbox" id="inlineCheckbox2" name="verdadero2" value="1"> ¿Verdadera?\n' +
            '</label>' +
            '</div>' + '<div class="form-group">' +
            '<label>3 respuesta</label>' +
            '<input class="form-control"   name="option3"  placeholder="3 respuesta">' +
            '<label class="checkbox-inline">\n' +
            '  <input type="checkbox" id="inlineCheckbox3" name="verdadero3" value="1"> ¿Verdadera?\n' +
            '</label>' +
            '</div>' + '<div class="form-group">' +
            '<label>4 respuesta</label>' +
            '<input class="form-control"   name="option4"  placeholder="4 respuesta">' +
            '<label class="checkbox-inline">\n' +
            '  <input type="checkbox" id="inlineCheckbox4" name="verdadero4" value="1"> ¿Verdadera?\n' +
            '</label>' +
            '</div>');
    }

}