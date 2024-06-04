//función creación del objeto XMLHttpRequest. 
function creaObjetoAjax () { //Mayoría de navegadores
    var obj;
    if (window.XMLHttpRequest) {
       obj=new XMLHttpRequest();
       }
    else { //para IE 5 y IE 6
       obj=new ActiveXObject(Microsoft.XMLHTTP);
       }
    return obj;
    }

    function enviar() {
        //Recoger datos del formulario:
        id=document.getElementById("idUsuario").value; //id escrito por el usuario
        dni=document.getElementById("dniUsuario").value; //id escrito por el usuario
        //datos para el envio por POST:
        misdatos="id="+id+"&dni="+dni;
        //Objeto XMLHttpRequest creado por la función.
        objetoAjax=creaObjetoAjax();
        //Preparar el envio  con Open
        objetoAjax.open("POST","verificacionidorden.php",true);
        //Enviar cabeceras para que acepte POST:
        objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        objetoAjax.setRequestHeader("Content-length", misdatos.length);
        objetoAjax.setRequestHeader("Connection", "close");
        objetoAjax.onreadystatechange=recogeDatos;
        objetoAjax.send(misdatos); //pasar datos como parámetro
        }
        function recogeDatos() {
            
            if (objetoAjax.readyState==4  && objetoAjax.status==200) {
                var miTexto=objetoAjax.responseText;
                document.getElementById("comp").innerHTML=miTexto;
                }
         }

        
