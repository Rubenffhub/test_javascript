<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Genera test</title>
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

  

<body onload="reset()">

    <h3>Test generado</h3>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aplicacionTest";
    // Creamos la conexión
    $enlace = mysqli_connect($servername, $username, $password, $dbname);

    if (mysqli_connect_error()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    //Consulta para recoger el numero de preguntas que hay en la base de datos
    $q = "SELECT id_test
    FROM test
    ORDER BY id_test DESC ";

    $dato = mysqli_query($enlace, $q);

    if (mysqli_num_rows($dato) > 0) {
        $fila = mysqli_fetch_array($dato);
    }

    $arrayNum = [];

    //Creo un array que se llena con 10 numeros aleatorios 
    //del 1 al numero de preguntas existentes
    while (count($arrayNum) < 11) {
        $random = rand(1, $fila[0]);
        if (in_array($random, $arrayNum) == false) {
            $arrayNum[] = $random;
        }
    }
    echo "<a href='U5Ej3TestPreguntasIndex.php'>Volver al menu</a>";
    $iteraRadio = 0;

    //-------------------------------------------------------------------------------------
    //Parte que pinta las preguntas
    for ($i = 0; $i < count($arrayNum) - 1; $i++) {
        $arrayRespuestas = [];

        $q = "SELECT pregunta_test
        FROM test
        WHERE id_test=$arrayNum[$i];
        ";

        $dato = mysqli_query($enlace, $q);

        //Pintado de preguntas
        if (mysqli_num_rows($dato) > 0) {
            $fila = mysqli_fetch_array($dato);
            $n = $i + 1;
            echo "<p>$n. $fila[0]</p>";
        }
        //Creo un array con 4 numeros aleatorios del 0 al 3
        //para crear las preguntas
        while (count($arrayRespuestas) != 4) {
            $random = rand(0, 3);
            if (in_array($random, $arrayRespuestas) == false) {
                $arrayRespuestas[] = $random;
            }
        }
        
        //Pintado de respuestas
        for ($j = 0; $j < count($arrayRespuestas); $j++) {

            $q = "SELECT respuesta1_test, respuesta2_test, respuesta3_test, respuesta4_test
            FROM test
            WHERE id_test=$arrayNum[$i];
            ";

            $dato = mysqli_query($enlace, $q);

            if (mysqli_num_rows($dato) > 0) {
                $fila = mysqli_fetch_array($dato);
                //print_r($fila);
                $x = $arrayRespuestas[$j];
                //print_r($x);

                echo "<p id='radio$iteraRadio'><input onclick=\"mostrarYcomprobar($i);\" type='radio' name='$i' 
                value=\"" . htmlspecialchars($fila[$x]) . "\"> " . htmlspecialchars($fila[$x]) . "</p>";
            }
            $iteraRadio++;
        }

        echo "<p><button id='button$i' onclick=\"quitarSeleccion($i);\" hidden>Quitar selección</button></p>";

        echo "<p><hr></p>";
    }
    //Fin del pintado de las preguntas
    //-------------------------------------------------------------------------------------------------------------
    echo "<a href='U5Ej3TestPreguntasIndex.php'>Volver al menu</a>";
    
    ?>

    <script>
        var arr = [];
        document.getElementById("indicaAciertos").style.marginLeft = "50px";
        document.getElementById("indicaFallos").style.marginLeft = "50px";

        //Funcion que permite quitar la seleccion y poder elegir otra opcion
        //Quita el color del texto
        //restablece el radio button
        //quita la seleccion
        function quitarSeleccion(idNum) {

            var botonesRadio = document.getElementsByName(idNum);

            for (i = 0; i < botonesRadio.length; i++) {
                botonesRadio[i].checked = false;
                if (botonesRadio[i].hasAttribute("disabled")) {
                    botonesRadio[i].removeAttribute("disabled");
                }
                
            }
            for (z = iteraRadio(idNum); z < iteraRadio(idNum)+4; z++) {
                document.getElementById("radio" + z).style.color = "black";
            }

            document.getElementById('button' + idNum).setAttribute("hidden", "");

        }
        
        //Funcion principal del programa *******************************************************

        //revisa si la respuesta es correcta comparando lo seleccionado
        //con todas las respuestas de la base de datos (1ª columna)
        function mostrarYcomprobar(idNum) {
            var controlaFallos = false;
            document.getElementById('button' + idNum).removeAttribute("hidden");

            var botonesRadio = document.getElementsByName(idNum);

            for (i = 0; i < botonesRadio.length; i++) {
                if (botonesRadio[i].checked) {
                    var resp = botonesRadio[i].value;
                }
            }
            var al = [];
            var ol = [];
            <?php

            //Extrae las respuestas correctas de la base de datos
            $q = "SELECT respuesta1_test
                FROM test;";

            $dato = $enlace->query($q);
            $numRow = $dato->num_rows;
            if ($numRow > 0) {
                while ($row = $dato->fetch_array()) {
            ?>
                    al.push("<?php echo htmlspecialchars($row[0]); ?>");
            <?php
                }
            }
            ?>

            console.log(iteraRadio(idNum)+4);
            //console.log(botonesRadio);
            resp = caracteresEspeciales(resp);
            var aprobado = false;

            for (y = 0; y < al.length; y++) {
                var nn = al[y];
                if (al[y] == resp) {
                    
                    for (z = iteraRadio(idNum); z < iteraRadio(idNum)+4; z++) {

                        document.getElementById("radio" + z).style.color = "blue";
                        for(t=0;t<4;t++){
                            botonesRadio[t].setAttribute("disabled","");
                        }
                        
                        
                    }
                    aprobado = true;
                    console.log("*******IGUALES**********");
                }
                if (al[y] != resp && aprobado == false) {
                    
                    for (z = iteraRadio(idNum); z < iteraRadio(idNum)+4; z++) {
                        for(t=0;t<4;t++){
                            botonesRadio[t].setAttribute("disabled","");
                        }
                        
                        document.getElementById("radio" + z).style.color = "red";
                    }
                    
                }
            }
            

        }

        //Funcion que corrige el indice para poder colorear las respuestas
        function iteraRadio(num) {
            switch (num) {
                case 0:
                    return 0;
                    break;
                case 1:
                    return 4;
                    break;
                case 2:
                    return 8;
                    break;
                case 3:
                    return 12;
                    break;
                case 4:
                    return 16;
                    break;
                case 5:
                    return 20;
                    break;
                case 6:
                    return 24;
                    break;
                case 7:
                    return 28;
                    break;
                case 8:
                    return 32;
                    break;
                case 9:
                    return 36;
                    break;

            }
        }

        //Funcion que corrige los caracteres especiales
        //(sobretodo por realizar preguntas sobre javascript)
        //Pueda que sea necesario agregar mas
        function caracteresEspeciales(texto) {
            return texto.replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }


        //Funcion que permite resetear todas las respuestas al recargar la pagina
        function reset() {

            for (i = 0; i < 10; i++) {

                var botonesRadio = document.getElementsByName(i);
                for (j = 0; j < botonesRadio.length; j++) {
                    botonesRadio[j].checked = false;
                }

            }
        }
    </script>
    

</body>

</html>