
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
   
    
    /*==================================================================
    [ Validate ]*/
    var input       = $('.validate-input .input100');
    var inputImagen = $('.validate-input .imagen-DNI-input-file');
    var inputDNI    = document.getElementsByClassName('inputDNI');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }
            for(var i=0; i<inputImagen.length; i++) {
                console.log(inputImagen[i]);
            if(validate(inputImagen[i]) == false){
                showValidate(inputImagen[i]);
                check=false;
                }
            }
                for(var i=0; i<inputDNI.length; i++) {
                    console.log(inputDNI[i].value)
                if(validateDNI(inputDNI[i].value) == false){
                    showValidate(inputDNI[i]);
                    check=false;
                    }
                }
        

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });
    /*valido DNI*/ 

      function validateDNI(dni) {
          console.log(dni.length);
        if(dni==null || dni.length < 8 || dni.length > 8 ){
            return false;
        }else{
            return true;
        }
      }
      
    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    
/*==================================================================
[ Mostrar Contraseña ]*/
document.querySelector('.contra .mostrar').addEventListener('click', e => {
    const passwordInput = document.querySelector('#password');
    const span = document.getElementsByClassName('mostrar');
    const eyeIcon = `<i class="far fa fa-eye-slash"></i>`;
    if (!e.target.classList.contains('show')) {
        e.target.classList.add('show');
        span.innerHtml = eyeIcon;
        /*e.target.textContent = 'Ocultar';*/
        passwordInput.type = 'text';
    } else {
        e.target.classList.remove('show');
       /* e.target.textContent = 'Mostrar';*/
        passwordInput.type = 'password';
    }
});
document.querySelector('.repetir-contra .mostrar').addEventListener('click', e => {
    const passwordInput = document.querySelector('#password1');
    const span = document.getElementsByClassName('mostrar');
    const eyeIcon = `<i class="far fa fa-eye-slash"></i>`;

    if (!e.target.classList.contains('show')) {
        e.target.classList.add('show');
        span.innerHtml = eyeIcon;
       /*e.target.textContent = 'Ocultar';*/
        passwordInput.type = 'text';
    } else {
        e.target.classList.remove('show');
        
       /* e.target.textContent = 'Mostrar';*/
        passwordInput.type = 'password';
    }
});

/*==================================================================
    [ Mostrar nombre de archivo de la imagen]*/
    

    document.querySelector('#input-imagen').addEventListener('change', (event) => {
    const div_imagen_dni = document.getElementById('div-icono');
    hideValidate(inputImagen[0]);
    const span  = document.getElementsByClassName('texto-imagen-dni');
    const icono = `<i class="fas fa fa-check-circle check_icon clearfix"></i>`;
    if(span[0].textContent == 'Subir Imagen...'){
        const texto = span[0].textContent.replace('Subir Imagen...', "Subida");
        span[0].textContent = texto;
        div_imagen_dni.innerHTML += icono;//*Se elimina el archivo*/
    }
    console.log(div_imagen_dni);
    });
    document.querySelector('#input-imagen1').addEventListener('change', (event) => {
    hideValidate(inputImagen[1]);
    const div_imagen_dni = document.getElementById('div-icono1');
    const span  = document.getElementsByClassName('texto-imagen-dni1');
    const icono = `<i class="fas fa fa-check-circle check_icon"></i>`;
    if(span[0].textContent == 'Subir Imagen...'){   
    const texto = span[0].textContent.replace('Subir Imagen...', "Subida");
    span[0].textContent = texto;
    div_imagen_dni.innerHTML += icono;//*Se elimina el archivo*/
    }
    });

})(jQuery);


