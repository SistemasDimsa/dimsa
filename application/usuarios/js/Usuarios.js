/**
 * Usuarios.js
 * Clase y funciones para el manejo de datos de usuarios
 * @copyright (c) 2015, Dimsa
 * @author José Francisco Montaño Andriano
 * @version 1.0 Beta
 * @since version 1.0 Beta
 * @package usuarios
 */

var Usuario = (function(){
    function Usuario(){
        
    };
    
    Usuario.prototype.login = function(usuario, contrasena){
        $.ajax({
            url: url + 'application/usuarios/controllers/AjaxController.php',
            type: 'post',
            dataType: 'json',
            data: {
                accion: 'login',
                usuario: usuario,
                contrasena: contrasena
            },
            beforeSend: function(){
                clase= $('#msjLogin').attr('class');
                $('#msjLogin').removeClass(clase).addClass('alert alert-info')
                        .text('Iniciando sesión...');
            },
            success: function(response){
                clase= $('#msjLogin').attr('class');
                if (response.status){
                    $('#msjLogin').removeClass(clase).addClass('alert alert-success')
                            .text(response.mensaje);
                    window.location = url;
                }
                else{
                    $('#msjLogin').removeClass(clase).addClass('alert alert-danger')
                            .text(response.mensaje);
                }
            },
            error: function(){
                clase= $('#msjLogin').attr('class');
                $('#msjLogin').removeClass(clase).addClass('alert alert-danger')
                        .text('Ocurrió un error al iniciar sesión. Intenta más tarde');
            }
        });
    };
    
    return Usuario;
})();

$(function(){
    
});

$(document).on('submit', '#loginForm', function(e){
    e.preventDefault();
    
    usuario = $('#usuario').val();
    contrasena = $('#contrasena').val();
    
    
});