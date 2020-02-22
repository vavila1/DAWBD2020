function Lab2_1() {
  var num = prompt("Ejercicio 1.- Ingresa el numero limite para poder saber el cuadrado y el cubo de cada numero: ");
  var body = document.getElementsByTagName("body")[0];
  var tabla   = document.createElement("table");
  var tblBody = document.createElement("tbody");
 
  for (var i = 1; i <= num; i++) {
    var hilera = document.createElement("tr");
 
    for (var j = 1; j <= 3; j++) {
      var celda = document.createElement("td");
      if(j==1){var textoCelda = document.createTextNode("Numero original "+i);
    }else if(j==2){
      var textoCelda = document.createTextNode("Numero al cuadrado: "+(i*i));
    }else if(j==3){
      var textoCelda = document.createTextNode("Numero al cubo es: "+(i*i*i));
    }
      celda.appendChild(textoCelda);
      hilera.appendChild(celda);
    }
 
    tblBody.appendChild(hilera);
  }
 
  tabla.appendChild(tblBody);

  body.appendChild(tabla);

  tabla.setAttribute("border", "2");
}
function Lab2_2(){
  let num1 = Math.floor(Math.random()*101);
  let num2 = Math.floor(Math.random()*101);
  let tiempo1 = Date.now();
  let resultado = prompt("¿Cúanto es "+num1+" + "+num2+"?");
  let tiempo2 = Date.now();
  let tiempo_final = 0;
  if((num1+num2)==resultado){
    tiempo_final = (tiempo2-tiempo1)/1000;
    document.write("Correcto<br>"+"Tu tiempo de respuesta fue de: "+tiempo_final+" segundos.");

  }else{
    tiempo_final = (tiempo2-tiempo1)/1000;
    document.write("Incorrecto"+"<br>Tu tiempo de respuesta fue de: "+tiempo_final+" segundos");
  }
}
function Lab2_3(){
let array = new Array(5)
let pos = 0;
let neg = 0;
let zero = 0;
array[0] = 1
array[1] = -5
array[2]=-3
array[3]=0
array[4]=0
for(let i = 0;i<5;i++){
  if(array[i]>0){
    pos++;
  }else if(array[i]<0){
    neg++;
  }else{
    zero++;
  }
  document.write("<br>El numero "+[i]+" es : "+array[i]);

}document.write("<br>Hay "+pos+" numeros positivos.<br>Hay "+neg+" numeros negativos.<br>Hay "+zero+" ceros");
}
function Lab2_4(){
      let aux = 0;
        let matriz = [];
        let arreglo = new Array(10);
      
      for(let i = 0; i < 5; i++) {
          matriz[i] = [];
          for(let j = 0; j < 10; j++) {
              matriz[i][j] = Math.floor(Math.random()*10);
              aux += matriz[i][j];
              document.write(matriz[i][j]+" ");
          }document.write("<br>");
          arreglo[i] = aux/10;
      }document.write("<br>");
      for(i = 0; i < 5; i++){
        document.write("Promedio"+" "+(i)+" "+arreglo[i]);
        document.write("<br>");
      }

}
function Lab2_5(){
  let digitos = prompt("Ejercicio 5:.-Escribe el numero de digitos que tendrá el numero que se invertirá");
  if(digitos>1){
  let numero = new Array(digitos);
  for(let i = 1;i<=digitos;i++){
    numero[i] = prompt("Ingresa digito "+[i]+" : ");
  }
  for(let j=digitos;j>0;j--){
    document.write(numero[j]);
  }
}else{alert("Debe ser mayor a 1")}
}