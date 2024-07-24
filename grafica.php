<?php
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=12345678")
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = 'SELECT * FROM prueba';
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados en HTML
//echo "<table>\n";

while ($row = pg_fetch_row($result))
	{
	echo "($row[2]). <br/>";
	}
//echo "</table>\n";


//echo json_encode($result);
// Liberando el conjunto de resultados
//pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Mi prueba</title>
        <style type="text/css">
            .charBox{
               width: 200px; 
               height:300px;
            }

        </style>
                
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    </head>
    <body>
        <div class="charBox">
        <canvas id="myChart" width="50" height="50"></canvas>
        </div>
    <script>
        
        var ctx= document.getElementById("myChart").getContext("2d");
        ctx.height = 50;
        var myChart= new Chart(ctx,{
            
            type:"bar",
            data:{
                labels:['col1','col2','col3'],
                datasets:[{
                        label:'Resultado',
                        data:[<?php $row[2][1]?>,5,20],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ]
                }]
            },
            
            options:{
                title: {
                    display: true,
                    text: 'Mi Titulo',
                    fontSize: 30
                    },
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        }
        );
    </script>
    </body>
</html>
