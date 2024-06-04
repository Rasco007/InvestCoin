function presiono(){
  /*Datos del Usuario*/
  recogeDatos();

    var id = document.getElementById("idUsuario").value;
    console.log(id);
    var link = "http://localhost/app/includes/getDatosUsuario.php?id="+id;

    var Binance_secret_key;
    var Binance_api_key;
    var Binance_mail;
    var signatura;
    fetch(link)
    .then(res => res.json())
    .then(data => {
      data.forEach(datoBinance => {
        Binance_mail = datoBinance.bin_mail;
        Binance_api_key = datoBinance.bin_api_key;
        Binance_secret_key = datoBinance.bin_secret_key;
      });
      /*TestTrade(Binance_secret_key, Binance_api_key);*/
        TradeOCO(Binance_secret_key, Binance_api_key);

    });
  
  
  }
  
  /*Calculate Signature*/
  
  /*var encrypted = CryptoJS.SHA256("fsdfsdfsdffasda");*/
  
  var Time;
  function calculateSignature(secret_key, url){
    
  var ServerTime;
  var signatura;
  var message;
  
    var signatura = CryptoJS.HmacSHA256(url, secret_key).toString(CryptoJS.enc.Hex);
  
    console.log(signatura);
    return signatura;
  
  }
  
  
  /*Account Info*/
  function TestTrade(secret_key, api_key){
  
  var recvWindow = 30000;
  var signatura;
  var ServerTime = Date.now();
  var texto = "symbol=BTCUSDT&side=BUY&type=MARKET&quantity=0.1&recvWindow=30000&timestamp="+ServerTime;
  
  signatura = calculateSignature(secret_key, texto);
  var url     = 'https://api.binance.com/api/v3/order/test'; /*&signature='+signatura;*/
  console.log(url);
  
  fetch(url,{
    method: 'POST',
    headers:{
          'Access-Control-Allow-Origin': "*", 
          'Access-Control-Allow_Headers': 'Origin, X-Requested-Witdh, Content-Type, Accept, X-MBX-APIKEY',
          'Content-type':'application/x-www-form-urlencoded;charset=UTF-8',
          'X-MBX-APIKEY': api_key
    },
    body: new URLSearchParams({
      'symbol': 'BTCUSDT',
      'side': 'BUY',
      'type': 'MARKET',
      'quantity': 0.1,
      'recvWindow':recvWindow,
      'timestamp':ServerTime,
      'signature':signatura
  })
  })
  .catch(error => console.error('Error:', error))
  .then(data => {
          console.log(data);
    });
  
  }

  function Trade(secret_key, api_key){

    var simbolo          = document.getElementById('simbolo').value;
    var side             = document.getElementById('side1').value;
    var precioMercado    = document.getElementById('precioMercado');
    var quantity         = document.getElementById('cantidad1').value;
    var precioStop       = document.getElementById('precioStop1');

    console.log(simbolo);
    console.log(side);
    console.log(quantity);

    
    
    var recvWindow = 30000;
    var signatura;
    var ServerTime = Date.now();
    var texto = "symbol="+simbolo+"&side="+side+"&type=MARKET&quantity="+quantity+"&recvWindow=30000&timestamp="+ServerTime;
    
    signatura = calculateSignature(secret_key, texto);
    var url     = 'https://api.binance.com/api/v3/order'; 
    console.log(url);
    
    fetch(url,{
      method: 'POST',
      headers:{
            'Access-Control-Allow-Origin': "*", 
            'Access-Control-Allow_Headers': 'Origin, X-Requested-Witdh, Content-Type, Accept, X-MBX-APIKEY',
            'Content-type':'application/x-www-form-urlencoded;charset=UTF-8',
            'X-MBX-APIKEY': api_key
      },
      body: new URLSearchParams({
        'symbol'    : simbolo,
        'side'      : side,
        'type'      : 'MARKET',
        'quantity'  : quantity,
        'recvWindow':recvWindow,
        'timestamp' :ServerTime,
        'signature' :signatura
    })
    })
    .catch(error => console.error('Error:', error))
    .then(data => {
            const divRes = document.getElementById('comp');
            const divRta = document.createElement('div');
            console.log(data.status);
            if(data.status == 400 || data.status == 403 ){
              divRta.innerHTML=`<div class='alert alert-danger text-center' role='alert' style='padding:0px 12px; margin-top: 12px;'> <b>Orden Rechazada!</b>Verifica los parametros e intente nuevamente. Error ${data.status}" </div>`;
              divRes.appendChild(divRta);
            }else if(data.status == 401){
              divRta.innerHTML=`<div class='alert alert-danger text-center' role='alert' style='padding:0px 12px; margin-top: 12px;'> <b>Orden Rechazada!</b>No estas autorizado a hacer esta llamada. Error ${data.status}" </div>`;
              divRes.appendChild(divRta);
            }else{
            }

      });
    
    }
  function TradeOCO(secret_key, api_key){

    var id               = document.getElementById("idUsuario").value;
    var simbolo          = document.getElementById('simbolo').value;
    var side             = document.getElementById('side1').value;
    var precioMercado    = document.getElementById('precioMercado1').value;
    var quantity         = document.getElementById('cantidad1').value;
    var precioStop       = document.getElementById('precioStop1').value;
    var precioStopLimit  = document.getElementById('precioStopLimit1').value;
    var fecha            = document.getElementById('fechamin1').value;

    
    var recvWindow = 30000;
    var signatura;
    var ServerTime = Date.now();
    var texto = "symbol="+simbolo+"&side="+side+"&quantity="+quantity+"&price="+precioMercado+"&stopPrice="+precioStop+"&stopLimitPrice="+precioStopLimit+"&stopLimitTimeInForce=GTC"+"&recvWindow=30000&timestamp="+ServerTime;
    signatura = calculateSignature(secret_key, texto);
    var url     = 'https://api.binance.com/api/v3/order/oco'; 
    console.log(url);
    
    fetch(url,{
      method: 'POST',
      headers:{
            'Access-Control-Allow-Origin': "*", 
            'Access-Control-Allow_Headers': 'Origin, X-Requested-Witdh, Content-Type, Accept, X-MBX-APIKEY',
            'Content-type':'application/x-www-form-urlencoded;charset=UTF-8',
            'X-MBX-APIKEY': api_key
      },
      body: new URLSearchParams({
        'symbol'              : simbolo,
        'side'                : side,
        'quantity'            : quantity,
        'price'               : precioMercado,
        'stopPrice'           : precioStop,
        'stopLimitPrice'      :precioStopLimit,
        'stopLimitTimeInForce':'GTC',
        'recvWindow'          :recvWindow,
        'timestamp'           :ServerTime,
        'signature'           :signatura
    })
    })
    
    .then((resp) => resp.json())
    .then(data => {
          const divRes = document.getElementById('comp');
          const divRta = document.createElement('div');

              if(data.orderListId != null){
                  divRta.innerHTML=`<div class='alert alert-success text-center' role='alert' style='padding:0px 12px; margin-top: 12px;'> <b>Orden con éxito!</b>." </div>`;
                  divRes.appendChild(divRta);

                  console.log(data.orderListId);                  
                  texto+="&id="+id+"&fecha="+fecha+"&orderListId="+data.orderListId;
                  //Objeto XMLHttpRequest creado por la función.
                  objetoAjax=creaObjetoAjax();
                  //Preparar el envio  con Open
                  objetoAjax.open("POST","insertOrden.php",true);
                  //Enviar cabeceras para que acepte POST:
                  objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  objetoAjax.setRequestHeader("Content-length", texto.length);
                  objetoAjax.setRequestHeader("Connection", "close");
                  objetoAjax.send(texto); //pasar datos como parámetro

              }else if(data.msg != null){
                  divRta.innerHTML=`<div class='alert alert-danger text-center' role='alert' style='padding:0px 12px; margin-top: 12px;'> <b>Orden Rechazada!</b>Verifica los parametros e intente nuevamente. Error ${data.msg}" </div>`;
                  divRes.appendChild(divRta);
                }
            })
      .catch(error => console.error('Error:', error));
    
    }
      
      
        

