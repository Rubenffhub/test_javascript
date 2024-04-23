drop database if exists aplicacionTest ;
create database aplicacionTest;
use aplicacionTest;

/*
alter table test auto_increment = 1;
*/

drop table if exists test;

create table test(
	id_test int(100) primary key auto_increment,
    pregunta_test varchar(100) not null,
    respuesta1_test varchar(100) not null,
    respuesta2_test varchar(100) not null,
    respuesta3_test varchar(100) not null,
    respuesta4_test varchar(100) not null
);

/* 1 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Cuál de los siguientes NO es un tipo de datos en JavaScript?",
"char",
"boolean",
"string",
"number"
);

/* 2 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para convertir una cadena a mayúsculas en JavaScript?",
"toUpperCase()",
"upperCase()",
"upperCaseString()",
"convertToUpper()"
);

/* 3 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Cuál es el resultado de \" var x = 2 + \"2\" \" en JavaScript?",
"\"22\" ",
"\"4\" ",
"4 ",
"22 "
);

/* 4 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para devolver la longitud de una cadena en JavaScript?",
"length()",
"size()",
"count()",
"charsOf()"
);

/* 5 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Cuál es la forma correcta de comentar una línea de código en JavaScript?",
"// comentario",
"-- comentario",
"/* comentario */",
"<!--- comentario --->"
);

/* 6 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para redondear un número al entero más cercano en JavaScript?",
"Math.round()",
"Math.ceil()",
"Math.floor()",
"Math.close()"
);

/* 7 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Cuál es el operador ternario en JavaScript?",
"?",
"::",
"$",
"#"
);

/* 8 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para eliminar el último elemento de un array en JavaScript?",
"pop()",
"shift()",
"delete()",
"remove()"
);

/* 9 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué operador se utiliza para concatenar cadenas en JavaScript?",
"+",
"&",
".",
"/"
);

/* 10 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para dividir una cadena en un array de subcadenas?",
"split()",
"slice()",
"join()",
"concat()"
);

/* 11 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para unir un array en una cadena concatenada?",
"join()",
"slice()",
"split()",
"concat()"
);

/* 12 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para imprimir un mensaje en la consola en JavaScript?",
"console.log()",
"print()",
"console.log=",
"log="
);

/* 13 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Cuál es el operador de igualdad estricta en JavaScript?",
"===",
"=",
"==",
"!=="
);

/* 14 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Qué método se utiliza para agregar un elemento al final de un array en JavaScript?",
"push()",
"append()",
"add()",
"shift()"
);

/* 15 */
insert into test 
(pregunta_test,respuesta1_test,respuesta2_test,respuesta3_test,respuesta4_test) 
values (
"¿Con qué etiquetas se incluye javascript en un archivo HTML?",
"<script> </script> ",
"<js> </js> ",
"<code> </code> ",
"<javascript> </javascript> "
);

select * from test;