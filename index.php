<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
   

    <title>Graph+</title>
    <style type="text/css">
            /* Tamaño de la grafica  */  
            
            .charBox{
               width: 600px; 
               height:800px;
            }
            </style>

  </head>
  <body>
    <table  class="default">
      <tr> <td>
       <p>  Tipo Grafica 
      <select id="tipoGrafica" >
         <option value="bar">Bar</option>
         <option value="doughnut">Doughnut</option>
         <option value="radar">Radar</option>
         <option value="polarArea">PolarArea</option>
         <option value="pie">Pie</option>
         <option value="line">Linea</option>
         
       </select>
          </td>
    <td>
    <p>  Tamaño Grafica 
      <select id="tGrafica" >
         <option value="400">Pequeño</option>
         <option value="600">Mediano</option>
         <option value="800">Grande</option>
        </select>
   </td><td>  <p>  Leyenda <input type="text" id="leyenda" name="leyenda" value="Titulo de Grafico"
       size="20">
</td>
          </tr>
          </table>
  <div class="card">
  <h5 class="card-header">Graficas</h5>
  <div class="card-body">
       <div class="row">
         <div class="col-lg-2">
             <button class="btn btn-primary" onclick="CargarDatosGraficos()">Ver grafica</button>
         </div>
       

    </div>
  <div class="charBox">
       <canvas id="myChart" width="400" height="400"></canvas>
  </div>
  
 </div>

<script>
  //variable global para poder borrar el canvas
  let myChart;
  //nuevo debo quitarlo
  
  //hasta aqui
  function CargarDatosGraficos(){
  $.ajax({
    url:'controlador_grafico.php',
    type:'POST'
 }).done(function(resp){
  var titulo = [];
  var cantidad = [];
  var color=[];
  var colorl=[];
  var datan=JSON.parse(resp);
  var tipo,tamano,leyenda;
// capturo las entradas
 tipo =$("#tipoGrafica option:selected").val();
 tamano =$("#tGrafica option:selected").val();
 leyenda =document.getElementById('leyenda').value;
//se llenan los vectores
  for(var i=0;i<datan.length;i++){
    //datos a graficar
    titulo.push(datan[i]['x']);
    //valores a graficar
    cantidad.push(datan[i]['y']);
   // genero los valores rgb de 1 a 255 para el color de las secciones, el ultimo es la tranparecia
    color.push('rgba('+aleatorio()+','+aleatorio()+','+aleatorio()+','+0.1*i+')');
       //color de linea cuando se selecciona
    colorl.push('rgba(0, 0, ,255)');
  
  }
 //Grafico 
var ctx = document.getElementById('myChart');
//destruyo la grafica anterior
if (myChart) {
        myChart.destroy();
    }
    
    //creo la nueva grafica
 myChart = new Chart(ctx, {
    type: tipo,
    data: {
        labels: titulo,
        datasets: [{
            label: leyenda,
            data: cantidad,
            backgroundColor:color,
            borderColor:colorl,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
})
 }

 function aleatorio() {
  return ~~(Math.random() * (255 - 1) + 1);
}
</script>
</body>
</html>

