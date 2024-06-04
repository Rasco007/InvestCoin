
var HTMLid = document.getElementsByClassName("idUsuario");
var id     =HTMLid[0].value;
console.log(id);
/*Datos del Usuario*/
var link = "http://localhost/app/includes/getDatosUsuario.php?id="+id;
console.log(link);
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

  AllCoinsInfo(Binance_secret_key, Binance_api_key);
});



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



/*Server Time - TIMESTAMP*/

function calculateServerTime(){
  var link = "https://api.binance.com/api/v3/time";
  var texto;
  fetch(link)
  .then(res => res.json())
  .then(data => {
  
    texto = data.serverTime;
    
  console.log(texto);
  putTime(texto);
  });
}





/*Account Info*/
function AllCoinsInfo(secret_key, api_key){

var recvWindow = 30000;
var signatura;
var ServerTime = Date.now();
var texto = "recvWindow=30000&timestamp="+ServerTime;

signatura = calculateSignature(secret_key, texto);
var url     = 'https://api.binance.com/sapi/v1/capital/config/getall?recvWindow=30000&timestamp='+ServerTime+'&signature='+signatura;
console.log(url);

var Moneda;
fetch(url,{
  method: 'GET',
  headers:{
        'Access-Control-Allow-Origin': "*", 
        'Access-Control-Allow_Headers': 'Origin, X-Requested-Witdh, Content-Type, Accept, X-MBX-APIKEY',
        'Content-type':'application/json',
        'Accept': 'application/json',
        'X-MBX-APIKEY': api_key

        
  }
})
.then(res => res.json())
.catch(error => console.error('Error:', error))
.then(data => {
  var i=0;
  var datoBinance = [];
  const divBilletera = document.getElementsByClassName('limiter-card-billetera');
  divBilletera.innerHTML = '';

  data.forEach(datoBinance => {
    Moneda = datoBinance.coin;

    if(Moneda == "BTC" || Moneda == "USDT" || Moneda == "ETH" || Moneda == "DOGE" || Moneda == "ADA" || Moneda == "XRP" || Moneda == "LTC"|| Moneda == "LINK" || Moneda == "DAI"){
      var symbol = Moneda + "USDT";
      const divMoneda = document.createElement('div');
      divMoneda.innerHTML=`
          
            <div class="mt-3 container-billetera">
              <div class="contenido-billetera clearfix">
                <div class="nav-billetera">
                  <div class="clearfix texto-billetera">
                      <img class="imagen-moneda" src="assets/img/monedas/${Moneda}.png" alt="${datoBinance.name}">
                      <form  class="comprar" action='chart.php'>
                        <input id="prodId" name="symbol" type="hidden" value="${symbol}">
                        <button class="btn-comprar">GRAFICO</button>
                       </form>
                      <p class="nombre-moneda">${datoBinance.name}</p>
                      <p class="dinero">$ ${datoBinance.free}</p>
                  </div>
                </div>
                

              </div>
            </div>`;
          divBilletera[0].appendChild(divMoneda);
        
    }
      
    /* if(datoBinance.trading == true){}*/

  });

  console.log(Moneda);
});
}




function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
function putTime(time){
Time = time;
}
function getTime(){
  return Time;
}