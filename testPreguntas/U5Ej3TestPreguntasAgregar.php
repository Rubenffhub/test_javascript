<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Agrega test</title>
</head>
    <!-- 
        RUBEN FERNANDEZ FERNANDEZ
        DesWebEntornoCliente - DWEC

        Crear un test sobre preguntas de javascript extraídas por chat gpt...
        Debemos tener varias preguntas (mínimo 15) con 4 respuestas de ellas una es la correcta.
        Las preguntas y las respuestas se mostrarán de forma aleatoria y siempre mostrarán 10 preguntas.
        Las preguntas y respuestas son obtenidas de BBDD.
        - Tienen que existir tres botones: Añadir nueva pregunta y respuesta.
        Realizar el test. Almacenar las nuevas preguntas y respuestas añadidas en la BBDD
        - Mostrar el cuestionario en el que por cada pregunta exista un botón que muestre 
            la respuesta una vez seleccionada la respuesta mostrar si es correcta o no 
            y si es incorrecta indicar la respuesta correcta mediante css.
        Las preguntas y las respuestas en este ejercicio tienen que ser extraídas de BBDD mediante php

    
    -->
<body>
    <style>
        
        .pregunta{
            width: 250px;
            height: 70px;
            white-space: inherit;
            resize: none;
            
        }
        .respuesta{
            width: 200px;
        }
        
        h3{
            margin-left: 10%;
        }
        .contenidos{
            border: 1px solid;
            padding: 5%;
            position: absolute;
            top: 50%;
            left: 50%;
            
            transform: translate(-50%, -50%);
        }
        
    </style>
    <div class="contenidos">
        <form method="post" action="#">
            <p id="indicaGuardado"></p>
            <h3>Crea nueva pregunta</h3>
            <p>Pregunta<br><br><textarea name="cajaPregunta" cols="5" rows="3" class="pregunta" placeholder="pregunta" maxlength="90" required></textarea></p>
            <p>Respuesta correcta<br><br> <input name="cajaRespuestaCorrecta" class="respuesta" type="text" placeholder="respuesta" maxlength="22" required></p>
            <p>Respuesta incorrecta 1<br><br> <input name="cajaRespuestaIncorrecta1" class="respuesta" type="text" placeholder="respuesta" maxlength="22" required></p>
            <p>Respuesta incorrecta 2<br><br> <input name="cajaRespuestaIncorrecta2" class="respuesta" type="text" placeholder="respuesta" maxlength="22" required></p>
            <p>Respuesta incorrecta 3<br><br> <input name="cajaRespuestaIncorrecta3" class="respuesta" type="text" placeholder="respuesta" maxlength="22" required></p>
            <br>
            <p>&nbsp;&nbsp;<input name="guardarPregunta" type="submit" value="Guardar pregunta">&nbsp;&nbsp;<input type="button" onclick="window.location.href='U5Ej3TestPreguntasIndex.php'" value="Cancelar pregunta"></p>
        </form>
    </div>

    <?php
    if(isset($_POST['guardarPregunta'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="aplicacionTest";
        // Creamos la conexión
        $enlace = mysqli_connect($servername,$username,$password,$dbname);

        if (mysqli_connect_error()){
            printf("Conexión fallida: %s\n", mysqli_connect_error());
            exit();
        }

        //Validacion de datos de entrada
        if(
            empty($_POST['cajaPregunta'])
            ||
            empty($_POST['cajaRespuestaCorrecta'])
            ||
            empty($_POST['cajaRespuestaIncorrecta1'])
            ||
            empty($_POST['cajaRespuestaIncorrecta2'])
            ||
            empty($_POST['cajaRespuestaIncorrecta3'])
            ){
                echo "
                <script>
                document.getElementById('indicaGuardado').style.marginLeft = '10%';
                document.getElementById('indicaGuardado').innerHTML = 'Error, pregunta no guardada';
                document.getElementById('indicaGuardado').style.color = 'tomato';
                </script>
                ";
            }else{

                //Insercion de datos dentro de la base de datos
            $q = "INSERT INTO test (pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test)
            VALUES ('$_POST[cajaPregunta]','$_POST[cajaRespuestaCorrecta]','$_POST[cajaRespuestaIncorrecta1]','$_POST[cajaRespuestaIncorrecta2]','$_POST[cajaRespuestaIncorrecta3]');
            ";
            //Comprobacion de que la insercion se ha podido realizar con exito
            if(mysqli_query($enlace, $q)){
                echo "
                <script>
                document.getElementById('indicaGuardado').style.marginLeft = '10%';
                document.getElementById('indicaGuardado').innerHTML = 'Pregunta guardada con éxito';
                document.getElementById('indicaGuardado').style.color = 'green';
                </script>
                ";
                //Cuando la insercion en la base de datos no se ha podido realizar
            }else{
                echo "
                <script>
                document.getElementById('indicaGuardado').style.marginLeft = '10%';
                document.getElementById('indicaGuardado').innerHTML = 'Error, pregunta no guardada';
                document.getElementById('indicaGuardado').style.color = 'tomato';
                </script>
                ";
            }
            mysqli_close($enlace);
        }
    }
        
    ?>

</body>
</html>