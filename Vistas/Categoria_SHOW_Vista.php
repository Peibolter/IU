<?php 
	class Categoria_SHOW{

		function crear($form,$idioma,$origen){ 
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
    		<header>
  			</header>
  			<?php  	

  			if($origen=="Modificar"){
  				
			echo "<form action=\"Categoria_Controller.php?ModificarView\" method=\"post\">";
  				} 
  				else{
			echo "<form action=\"Categoria_Controller.php\" method=\"post\">";
			}
			echo "<fieldset>";
			echo "<input type=\"text\" aling=\"right\" placeholder=\"".$idiom['Categoria']."\"name=\"buscar\" ><input  type=\"submit\" name=\"buscador\" value=\"Buscar\">";
			echo "</fieldset>";
			echo "</form>";
	 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Modificar"){
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Categoria_Controller.php?Modificar=".$form[$numar]['nombre']."\">";
				}else{ 
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Categoria_Controller.php?View=".$form[$numar]['nombre']."\">";
			}
			echo "<fieldset><legend>".$idiom['Categoria']."</legend>";
			echo "<br>";
			/*echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Apellidos'].":".$form[$numar]["apellido1"];
			echo "<br>";*/
			echo $idiom['Nombre'].":"." ".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['Descripcion'].":"." ".$form[$numar]["descripcion"];
			echo "<br>";
			if($origen=="Modificar"){
				echo "<a href=\"Categoria_Controller.php?Modificar=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
			}
			else{ 
			echo "<a href=\"Categoria_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
			}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Categoria_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>