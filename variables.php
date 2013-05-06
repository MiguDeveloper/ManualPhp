<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uso de Variables</title>
</head>
<body>
	<?php
		function cabecera($textos){
			echo "</br></br>+-------- $textos ---------------+</br>";
		}


		$var="bob";
		$Var="Joe";
		
		#usamos isset para saber si la variable a sido inicializada
		#si esta inicializada saldra true
		cabecera("usamos el comando var_dump para imprimir isset TRUE");
		var_dump(isset($var)); #usamos el comando var_dump para imprimir isset TRUE
		echo "</br> $var, $Var";
		
		#Ejemplo de uso de variables de referencia
		
		function suma(&$var1, $var2){
			$var1=$var2 + 5;
		}

		cabecera("Ejemplo de uso de variables de referencia");
		$nume1=23;
		echo "</br>Antes de la referencia: $nume1";
		suma($nume1, 2);
		echo "</br>Luego de la referencia: $nume1 </br>";

		#----- Variales Pre-Definidas $GLOBALS , $_SERVER,  $_GET, $_REQUEST, $_SESSION --------
		
		#Variable $GLOBALS
		cabecera("Accediendo a variable con GLOBALS ambito de variables");
		function test(){
			$foo = "Variable local de la funcion";
			echo "$foo en el ambito global: " . $GLOBALS["foo"] . "\n";
			echo "$foo en el ambito actual: " . $foo . "\n";
		}
		$foo="Variable fuera de la funcion.</br>";
		test();

		
		#Variable $_SERVER

		cabecera("Variables _SERVER");
		echo "</br> El escript se esta ejecutando en: " . $_SERVER["SERVER_NAME"];

		#Variable $_GET por ejemplo en el caso de formularios
		cabecera("Obtener valores de un formulario usando GET")
	 ?>

	<form action="#" method="GET">
		<input type="text" name="nombre">
		<input type="text" name="mail">
		<input type="submit" value="enviar">
	</form>

	<?php


		$nomb=$_GET["nombre"];
		$email=$_GET["mail"];
		echo "Hola $nomb, es un gusto!, en breve te enviaremos un mail a: $email";

		#Acceso a data del formulario usando REQUEST
		cabecera("Acceso a data del formulario usando REQUEST");
		$cor1=$_REQUEST["mail"];
		echo "</br>Este es el correo de inscripcion: $cor1";

		
		#Acceso mediante $_SESSION
		
		cabecera("Acceso mediante SESSION");
		$_SESSION["usuario"]=$_REQUEST["nombre"];

		echo "</br>Inicio sesion hoy: " . $_SESSION['usuario'];
	 ?>

	<?php 
		# ---- Ambito de las variables, podemos usar tbm global ---
		$aa = 1;
		$num1 = 3;
		$num2 = 4;

		function tex(){
			$aa="mensaje aa";
			return $aa;
		}

		#Funcion donde tomamos variable de fuera de ambito

		#USO DEL GLOBAL O TBM PODEMOS USAR $GLOBALS[]
		#podemos usar variables fuera del ambito usando global

		cabecera("Ambito de las Variable usano global o GLOBALS");
		function sumar(){
			global $num1, $num2;
			return $num1 + $num2;
		}

		echo "</br>Este es en el ambito general: $aa
		</br> esta es del ambito local de la funcion: " . tex();

		echo "</br> Suma de num1 y num2 : " . sumar() . "</br>";

		#USO DE VARIABLES ESTATICAS 'STATIC' las usamos como funcione recursivas

		#Usamos static cuando queremos que el valor de una variable,
		#se mantenga dentro de la funcion o en su ambito local
		
		cabecera("Uso de Static para que el valor de la variable se mantenga en la funcion podemos usarlo para contadores");
		function conteo(){
			static $contador = 0;
			++$contador;
			return $contador;
		}
		
		for ($i=0; $i < 50 ; $i++) { 
			echo conteo() . ", ";
		}

		echo "</br>";
		
		#EXISTENCIA DE UNA VARIABLE: EMPTY
		
		#usamos 'isset' para ver si la variable a sido inicilizada
		#usamos 'empty' para ver si la variable esta vacia o con un valor
		#usamos 'var_dump' para saber el tipo de variable y su valor actual (DEPURACION)

		cabecera("Verificar si la variable esta vacia con Empty");
		$drdr = 10;
		
		echo "</br>";

		if (!empty($drdr))
			echo "La variable \$drdr contiene: " . $drdr . "</br>";
		else
			echo "La variable \$drdr esta vacia";

		cabecera("Vemos si la variable a sido inicializada");
		var_dump(isset($drdr));

		#INFORMACION SOBRE EL TIPO DE VARIABELE
		

		#preguntamos por un tipo especial
		
		cabecera("Preguntamos si la variable es array");
		var_dump(is_array($drdr));

		#usamos gettype para saber que tipo de variable tenemos

		cabecera("usamos gettype para saber que tipo de variable tenemos");
		echo "</br>esto es usando gettype: " . gettype($drdr);

		if (gettype($drdr) == "integer") {
			echo "</br>Esta variable es integer";
		}

		#OBLIGAR A UNA VARIABLE QUE SEA DE UN TIPO ESPECIFICO
		#Usamos settype(var , "tipo")

		$rrr="hola";
		settype($rrr,"boolean");

		#SEPARAR EL CONTENIDO DE UNA VARIABLE
		#usamos floatval(), intval(), strval()

		cabecera("Separar el contenido de una variable");
		$rtys="89.53Pepe es madrilenio";

		#devuelve el numero de como flotante al inicio sino no
		echo "</br>" . floatval($rtys) . " parte flotante de una cadena.";
		echo "</br>" . intval($rtys) . " devuelve la parte entera";
		echo "</br>" . strval($rtys) . " devuelve la cadena";


		#Ver el contenido de variables no escalares
		#por ejemplo los Arrays o Objects
		#usamos print_r() o var_dump()

		cabecera("Imprimimos un Arraay con print_r()");
		$arrar= array('uno1' => 'manzana' , 'dos2' => 'banano', 'c' => array('x','y','z'));
		print_r($arrar);

		cabecera("Imprimimos un Arraay con var_dump()");
		$segarray = array(1,2,3,array("a","b","c"));
		var_dump($segarray);

		#VARIABLES AMBIGUAS

		cabecera("Uso dinamico de funciones");
		$ddd="Hello";

		$$ddd="World";

		echo "$ddd $Hello"



	 ?>


</body>

</html>
