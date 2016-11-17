<?php 

  include("../Modelos/Grupo_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Grupo_ADD_Vista.php");
  include("../Vistas/Grupo_DELETE_Vista.php");
  include("../Vistas/Grupo_SHOW_Vista.php");
  include("../Vistas/Grupo_VIEW_Vista.php");
  include("../Vistas/Grupo_EDIT_Vista.php");
  include("../Vistas/Grupo_Menu_Vista.php");
  include("../Vistas/MenuPrincipal_Show_Vista.php");
session_start();

  	if(isset($_POST['grupo']))
  		{
  			$idiom=new idiomas();
  			$vista=new Grupo_Menu();
  			$vista->crear($idiom);
  		}

  		if(isset($_REQUEST['Alta'])){
  			$idiom=new idiomas();
  			
        $model=new Grupo();
        $model->consultarFuncionalidad();
        include("../Archivos/ArrayConsultarFuncionalidad.php");
        $datos=new consult();
        $form=$datos->array_consultar();
        $alta=new GrupoAlta();
  			$alta->crear($idiom,TRUE,$form,FALSE);

  		}
  		if (isset($_REQUEST['AltaGrupo']))
  		{
  			$idiom=new idiomas();
  			$nombreGrupo=$_POST['Nombre'];
        $descripcion=$_POST['descripcion'];
        if (isset($_POST['funcional'])){ 
        $funcionalidades=$_POST['funcional'];
  			$model=new Grupo();
  			$resultado=$model->comprobarexiste($nombreGrupo);
  			if($resultado==FALSE)
  			{
			  $model->altaGrupo($nombreGrupo,$descripcion);
        $model->inserGrupoFuncionalidades($nombreGrupo,$funcionalidades);
        $origen="Alta";
  			$vista=new panel();
        $vista->constructor($idiom,$origen);
  			}else
  			{
        $model=new Grupo();
        $model->consultarFuncionalidad();
        include("../Archivos/ArrayConsultarFuncionalidad.php");
        $datos=new consult();
        $form=$datos->array_consultar();
  			$alta=new GrupoAlta();
  			$alta->crear($idiom,FALSE,$form,FALSE);
  			}		
        }else{
        $idiom=new idiomas();
        $model=new Grupo();
        $model->consultarFuncionalidad();
        include("../Archivos/ArrayConsultarFuncionalidad.php");
        $datos=new consult();
        $form=$datos->array_consultar();
        $alta=new GrupoAlta();
        $alta->crear($idiom,TRUE,$form,TRUE);
        }
  		}
  		if (isset($_REQUEST['Consultar']))
		{
        $origen="consultar";
			   $idiom=new idiomas();
			   $model=new Grupo();
			   $model->ConsultarGrupo();
  			include("../Archivos/ArrayConsultarGrupo.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Grupo_SHOW();
  			$vistas->crear($form,$idiom,$origen);

		}
  		
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView']))
  			{
        $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Grupo();
  			$model->buscarGrupo($name);
  			include("../Archivos/ArrayBuscarGrupo.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Grupo_SHOW();
  			$vistas->crear($form,$idiom,$origen);

	  		}

    if (isset($_REQUEST['Modificar1'])){
          $origen="Modificar";
          $idiom=new idiomas();
          $model=new Grupo();
          $model->ConsultarGrupo();
          include("../Archivos/ArrayConsultarGrupo.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vista=new Grupo_SHOW();
          $vista->crear($form,$idiom,$origen);
        }
	  if (isset($_REQUEST['Modificar']))
  		{	
          $origen="Modificar";
  				$idiom=new idiomas();
          $model=new Grupo();
          $nombre=$_REQUEST['Modificar'];
          $model->buscarGrupo($nombre);
          include("../Archivos/ArrayBuscarGrupo.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $model->crearArraGrupodeFuncionalidad($nombre);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrays=new grupos1();
          $formfuncionalidades=$arrays->array_consultar();
          $vistas=new Grupo_VIEW();
          $vistas->crear($form,$idiom,$origen,$formfuncionalidades);
  		}
       if(isset($_REQUEST['Modificar2'])){
          $idiom=new idiomas();
          $origen="Modificar"; 
          $name=$_REQUEST['Modificar2'];
          $model=new Grupo();
          $model->consultarFuncionalidad();
          include("../Archivos/ArrayConsultarFuncionalidad.php");
          $datos=new consult();
          $form=$datos->array_consultar();
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $datos=new grupos1();
          $formfunciona=$datos->array_consultar();
          $vista=new GrupoEDIT();
          $vista->crear($idiom,$name,$formfunciona,$form,TRUE);
      }
  		if (isset($_REQUEST['ModificarGrupo']))
  		{
        $origen="Modificar";
  			$idiom=new idiomas();
  			$name=$_POST['Nombre'];
        if(isset($_POST['funcional'])){
        $funcionalidades=$_POST['funcional'];
  			$descripcion=$_POST['descripcion'];
  			$model=new Grupo();
  				$model->modificarGrupo($name,$descripcion);
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $datos=new grupos1();
          $form=$datos->array_consultar();
          $model->modificarFuncionalidadGrupo($funcionalidades,$name);
  				$vista=new panel();
          $vista->constructor($idiom,$origen);
        }else{
          $model=new Grupo();
          $model->consultarFuncionalidad();
          include("../Archivos/ArrayConsultarFuncionalidad.php");
          $datos=new consult();
          $form=$datos->array_consultar();
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $datos=new grupos1();
          $formfunciona=$datos->array_consultar();
          $vista=new GrupoEDIT();
          $vista->crear($idiom,$name,$formfunciona,$form,FALSE);
        }
  		}
  		if(isset($_REQUEST['Baja'])){

  				$idiom=new idiomas();
            $model=new Grupo();
            $model->ConsultarGrupo();
          include("../Archivos/ArrayConsultarGrupo.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
  				$vista=new GrupoDelete();
  				$vista->crear($idiom,TRUE,$form);
  		}
  		 if (isset($_REQUEST['BajaGrupo']))
  			{
        $origen="Baja";
  			$idiom=new idiomas();
  			$name=$_REQUEST['BajaGrupo'];
  			$model=new Grupo();
  			$resultado=$model->comprobarexiste($name);
  			$model->BajaGrupo($name);
  			$vista=new panel();
        $vista->constructor($idiom,$origen);
  			}
         if(isset($_REQUEST['View']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $name=$_REQUEST['View'];
          $model=new Grupo();
          $model->crearArrrayGrupo($name);
          include("../Archivos/ArrayGrupo.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrays=new grupos1();
          $formfuncionalidades=$arrays->array_consultar();
          $vistas=new Grupo_VIEW();
          $vistas->crear($form,$idiom,$origen,$formfuncionalidades);
        }
          if(isset($_REQUEST['BajaShow']))
        {  
          $origen="Baja";
          $idiom=new idiomas();
          $name=$_POST['buscar'];
          $model=new Grupo();
          $model->buscarGrupo($name);
          include("../Archivos/ArrayBuscarGrupo.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $vistas=new GrupoDelete();
          $vistas->crear($idiom,TRUE,$form);
        }

          if(isset($_REQUEST['BajaShow1']))
         {

          $origen="Baja";
          $idiom=new idiomas();
          $name=$_REQUEST['BajaShow1'];
          $model=new Grupo();
          $model->buscarGrupo($name);
          include("../Archivos/ArrayBuscarGrupo.php");
          $arrays=new buscar();
          $form=$arrays->array_consultar();
          $model->crearArraGrupodeFuncionalidad($name);
          include("../Archivos/ArraGrupodeFuncionalidad.php");
          $arrays=new grupos1();
          $formfuncionalidades=$arrays->array_consultar();
          $vistas=new Grupo_VIEW();
          $vistas->crear($form,$idiom,$origen, $formfuncionalidades);
         }
        if(isset($_REQUEST['ModificarView']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Grupo();
        $model->buscarGrupo($name);
        include("../Archivos/ArrayBuscarGrupo.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Grupo_SHOW();
        $vistas->crear($form,$idiom,$origen);
      }

  			if (isset($_REQUEST['Volver']))
  			{
        $origen="volver";
  			$idiom=new idiomas();
  			 $vista=new panel();
        $vista->constructor($idiom,$origen);
  			}

  		
?>