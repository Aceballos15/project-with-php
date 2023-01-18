$(document).ready(function() {
    $('#form-add').submit(function(event) {
        const Data= {
            name: $('#nombre').val(),
            precio: $('#precio').val(), 
            imagen: $('imagen').val(), 
            stock: $('stock').val(),
            estado: $('estado').val(),
            descripcion: $('descripcion').val(),
        }
    }); 
    event.preventDefault();
}); 