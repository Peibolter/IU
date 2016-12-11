<?php 
class Actividad_DELETE{

	function crear($datos12,$idioma,$origen){

       	//incluimos el archivo de funciones
        include '../Funciones/funciones.php';
        include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        include("../Archivos/ArrayNotificaciondeUsuario.php");
       
        //comprobamos el idioma
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        //
         //cargamos las notificaciones en la cabecera
        $datos=new datos();
        $formulario=$datos->array_consultar();
        $clase=new cabecera();
        $clase->crear($idiom,$formulario);
        //
        include('../plantilla/menulateral.php');
        include("../Archivos/ArrayAccionesdelasFuncionalidades.php");
        //cargamos el array de funcionalidades acciones en el menu lateral
        $datos=new consultar60();
        $form54=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form54);

?>
 			<?php

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Actividad_Controller.php?BajaF=".$datos12[0]."\">";
			echo "<fieldset><legend>".$idiom['Actividad']."</legend>";
			echo "<br>";
			echo $idiom['Nombre'].":".$datos12[0];
			echo "<br>";
			echo $idiom['Categoria'].":".$datos12[1];
			echo "<br>";
			echo $idiom['Espacio'].":".$datos12[2];
			echo "<br>";
			echo $idiom['Usuario'].":".$datos12[3];
			echo "<br>";
			echo $idiom['descripcion'].":".$datos12[4];
			echo "<br>";
			echo $idiom['FechaInicio'].":".$datos12[5];
			echo "<br>";
			echo $idiom['FechaFin'].":".$datos12[6];
			echo "<br>";
			echo $idiom['HoraInicio'].":".$datos12[7];
			echo "<br>";
			echo $idiom['HoraFin'].":".$datos12[8];
			echo "<br>";
			echo $idiom['Precio'].":".$datos12[9];
			echo "<br>";
			echo $idiom['maxAlumnos'].":".$datos12[10];
			echo "<br>";
			echo $idiom['Dias'].":".$datos12[11];
			echo "<br>";
			echo "<a href=\"Actividad_Controller.php?BajaF=".$datos12[0]."\""."><input type=\"image\"  src=\"..\Archivos\\eliminar.png\" onClick=\"return confirm('".$idiom['ConfirmarADelete'].$datos12[0]."?')\" width=\"20\" height=\"20\"></a>";
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
?>



<?php
	include '../plantilla/pie.php';
	}}


?>
