<?php

	class Usuarios_Menu{

		function crear($idioma){ 
			include('../plantilla/cabecera.php');
        	include("../Funciones/comprobaridioma.php");
        	$clase=new cabecera();
        	$clases=new comprobacion();
        	$idiom=$clases->comprobaridioma($idioma);
        	$clase->crear($idiom);
        	include('../plantilla/menulateral.php');
        	$menus=new menulateral();
       		$menus->crear($idiom);
    		?>
    
			<div class="container well">
 			<div class="row">
			<div class="col-xs-12">
    		<form id="formulario" class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Alta"  value="<?php echo $idiom['AltaUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Baja"  value="<?php echo $idiom['BajaUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Modificar"  value="<?php echo $idiom['ModificacionUsuario'];?>">    
              </form>
              <form class="principal" method="post" action="..\Controlador\Usuario_Controller.php">
             <input type="submit" class="btn btn-default" name="Consultar"  value="<?php echo $idiom['ConsultaUsaurio'];?>">
              </form>
	</div>
	</div>
	</div>
			<?php 
	include '../plantilla/pie.php';
		}	

			

		}
?>