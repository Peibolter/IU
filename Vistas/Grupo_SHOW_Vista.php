<?php 
	class Grupo_SHOW{

		function crear($form,$idioma,$origen){ 

			include('../plantilla/cabecera.php');
        include("../Funciones/comprobaridioma.php");
        $clase=new cabecera();
        $clases=new comprobacion();
        $idiom=$clases->comprobaridioma($idioma);
        $clase->crear($idiom);
        include('../plantilla/menulateral.php');
        include("../Archivos/ArrayAccionesdelasFuncionalidades.php");
        $datos=new consultar60();
        $form1=$datos->array_consultar();
        $menus=new menulateral();
        $menus->crear($idiom,$form1);
    		?>
    		<header>
  			</header>
			<?php 
				if($origen=="Modificar"){
			echo "<form action=\"Grupo_Controller.php?ModificarView\" method=\"post\">";
  				}elseif($origen=="Baja"){
				echo "<form action=\"Grupo_Controller.php\" method=\"post\">";
				}
  				else{ 
			echo "<form action=\"Grupo_Controller.php\" method=\"post\">";
			}
			?>
			<fieldset>
			<input type="text" aling="right" placeholder=<?php echo $idiom['Nombre']; ?> name="buscar" ><input  type="submit" name="buscador" value="Buscar">
			</fieldset>
			</form>
<?php 		 

		for ($numar =0;$numar<count($form);$numar++){

			echo "<div class=\"container well\">";
 			echo "<div class=\"row\">"; 
			echo "<div class=\"col-xs-12\">";
			if($origen=="Modificar"){
				echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Grupo_Controller.php?Modificar=".$form[$numar]['nombre']."\">";
			}else{ 
			echo "<form class=\"form-horizontal\" method=\"post\" action=\"..\Controlador\Grupo_Controller.php?View=".$form[$numar]['nombre']."\">";
			}
			echo "<fieldset><legend>".$idiom['GrupoName']."</legend>";
			echo "<br>";

			echo $idiom['Nombre'].":".$form[$numar]["nombre"];
			echo "<br>";
			echo $idiom['descripcion'].":".$form[$numar]["descripcion"];
			echo "<br>";
			if($origen=="Modificar"){
			echo "<a href=\"Grupo_Controller.php?Modificar=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lapiz.png\" width=\"20\" height=\"20\"></a>";
				}elseif($origen=="Baja"){
					echo "<a href=\"Grupo_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\eliminar.png\" width=\"20\" height=\"20\"></a>";
				}else{ 
			echo "<a href=\"Grupo_Controller.php?View=".$form[$numar]['nombre']."\""."><input type=\"image\" src=\"..\Archivos\\lupa.jpg\" width=\"20\" height=\"20\"></a>";
				}
			echo"</fieldset>";
			echo"</form>";
 			echo "</div>";
			echo "</div>";
			echo "</div>";
			
		 	}
		 	echo "<a href=\"Grupo_Controller.php?Volver\"><input type=\"image\" src=\"..\Archivos\\volver.png\" width=\"20\" height=\"20\"></a>";

		 
?>
	</div></div></div>
		
	</div>
<?php 
include '../plantilla/pie.php';
}
}
?>