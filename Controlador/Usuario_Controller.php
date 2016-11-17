<?php 
  include("../Modelos/Usuario_Model.php");
  include("../Idiomas/idiomas.php");
  include("../Vistas/Usuario_ADD_Vista.php");
  include("../Vistas/Usuario_DELETE_Vista.php");
  include("../Vistas/Usuario_SHOW_Vista.php");
  include("../Vistas/Usuario_VIEW_Vista.php");
  include("../Vistas/Usuario_EDIT_Vista.php");
  include("../Vistas/MenuPrincipal_Show_Vista.php");
  session_start();

  	if(isset($_REQUEST['usuarios']))
  		{
  			$idiom=new idiomas();
  			$vista=new Usuarios_Menu();
  			$vista->crear($idiom);
  		}
  		if(isset($_REQUEST['Alta']))
      {
  		$idiom=new idiomas();
  		$alta=new UsuarioAlta();
        $model=new Usuario();
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta->crear($idiom,TRUE,$form,null);
  		}
  		if (isset($_REQUEST['AltaUsuario']))
  		{ 
  			$idiom=new idiomas();
  			$nombreUsuario=$_POST['Nombre'];
        $apellidos=$_POST['Apellido'];
        $Fecha=$_POST['FechaNac'];
        $dni=$_POST['DNI'];
        $email=$_POST['email'];
        $usuario=$_POST['Usuario'];
        $password=$_POST['Password'];
        $grupo=$_POST['grupo'];
        $codigopostal=$_POST['codigopostal'];
        $cuenta=$_POST['cuenta'];
        $descripcion=$_POST['descripcion'];
        $formatocorrecto="true";
        $msg="";
        if ($_FILES['foto']['size']>200000)
        {$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
        $formatocorrecto="false";}

        if (!($_FILES['foto']['type'] =="image/jpeg" OR $_FILES['foto']['type'] =="image/gif"))
        {
        $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
        $formatocorrecto="false";}

        if($formatocorrecto=="true"){

        $foto=$_FILES['foto']['name'];
        $ruta=$_FILES["foto"]["tmp_name"];
        $destino="../Archivos/".$foto;
        copy($ruta,$destino);
        $password=md5($password);
  			$model=new Usuario();
  			$resultado=$model->comprobarexiste($usuario,$dni);

        if($resultado==FALSE)
  			{
          $origen="Alta";
			    $model->altaUsuario($nombreUsuario,$apellidos,$Fecha,$email,$usuario,$password,$dni,$grupo,$foto,$codigopostal,$cuenta,$descripcion);
          $vista=new panel();
          $vista->constructor($idiom,$origen);
  			}else
  			{
  			$alta=new UsuarioAlta();
        $model=new Usuario();
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  			$alta->crear($idiom,FALSE,$form,null);
  			}
        }else{
          $alta=new UsuarioAlta();
        $model=new Usuario();
        $model->crearArrrayGrupo();
        include("../Archivos/ArrayGrupo_usuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
        $alta->crear($idiom,FALSE,$form,$msg);

        }
  		}
  		if (isset($_REQUEST['Consultar']))
		 {  
        $origen="consultar";
			  $idiom=new idiomas();
			  $model=new Usuario();
			  $model->creararrayUsuarios();
  			include("../Archivos/ArrayConsultarUsuarios.php");
  			$arrays=new consult();
  			$form=$arrays->array_consultar();
  			$vistas=new Usuario_SHOW();
  			$vistas->crear($form,$idiom,$origen);
		}
  		if (isset($_POST['buscador']) and !isset($_REQUEST['ModificarView']))
  		
      	{
        $origen="consultar";
  			$idiom=new idiomas();
  			$name=$_POST['buscar'];
  			$model=new Usuario();
  			$model->buscarUsuario($name);
  			include("../Archivos/ArrayBuscarUsuario.php");
  			$arrays=new buscar();
  			$form=$arrays->array_consultar();
  			$vistas=new Usuario_SHOW();
  			$vistas->crear($form,$idiom,$origen);
	  		}

        if (isset($_REQUEST['Modificar1']))
        { 
        $idiom=new idiomas();
        $origen="Modificar";
        $model=new Usuario();
        $model->creararrayUsuarios();
        include("../Archivos/ArrayConsultarUsuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
        $vistas=new Usuario_SHOW();
        $vistas->crear($form,$idiom,$origen);
        }

	  if (isset($_REQUEST['Modificar']))
  		{	
          $origen="Modificar";
  			  $idiom=new idiomas();
          $usuario=$_REQUEST['Modificar'];
          $model=new Usuario();
          $model->crearArrrayUsuario($usuario);
          include("../Archivos/ArrayUsuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Usuario_VIEW();
          $vistas->crear($form,$idiom,$origen);

  		}
      if(isset($_REQUEST['Modificar2']))
      {   
          $idiom=new idiomas();
          $origen="Modificar"; 
          $user=$_REQUEST['Modificar2'];
          $vista=new UsuarioEDIT();
          $model=new Usuario();
          $model->crearArrrayGrupo();
          include("../Archivos/ArrayGrupo_usuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vista->crear($idiom,TRUE,$form,$user,null);
      }
  		if (isset($_REQUEST['ModificarUsuario']))
  		{
        $msg="";
  			$idiom=new idiomas();
        $nombreUsuario=$_POST['Nombre'];
        $apellidos=$_POST['Apellido'];
        $Fecha=$_POST['FechaNac'];
        $dni=$_POST['DNI'];
        $email=$_POST['email'];
        $usuario=$_POST['Usuario'];
        $password=$_POST['Password'];
        $grupo=$_POST['grupo'];
        $codigopostal=$_POST['codigopostal'];
        $cuenta=$_POST['cuenta'];
        $descripcion=$_POST['descripcion'];

        $formatocorrecto="true";

        if ($_FILES['foto']['size']>200000)
        {$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
        $formatocorrecto="false";}

        if (!($_FILES['foto']['type'] =="image/jpeg" OR $_FILES['foto']['type'] =="image/gif"))
        {
        $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
        $formatocorrecto="false";}

        if($formatocorrecto=="true"){

        $foto=$_FILES['foto']['name'];
        $ruta=$_FILES["foto"]["tmp_name"];
        $destino="../Archivos/".$foto;
        copy($ruta,$destino);
        $password=md5($password);
        $model=new Usuario();
        $resultado=$model->comprobarexiste($usuario,$dni);
        if($resultado==TRUE)
        { 
          $origen="Modificar";
          $model->modificarUsuario($nombreUsuario,$apellidos,$Fecha,$email,$usuario,$password,$dni,$grupo,$foto,$codigopostal,$cuenta,$descripcion);
  				$idiom=new idiomas();
  				 $vista=new panel();
          $vista->constructor($idiom,$origen);
  			}else{
			   	$idiom=new idiomas();
  				$vista=new UsuarioEDIT();
          $model=new Usuario();
         $model->crearArrrayGrupo();
         include("../Archivos/ArrayGrupo_usuarios.php");
         $arrays=new consult();
         $form=$arrays->array_consultar();
  				$vista->crear($idiom,FALSE,$form,$usuario,null);
  			}
        }else{

          $idiom=new idiomas();
          $vista=new UsuarioEDIT();
          $model=new Usuario();
          $model->crearArrrayGrupo();
          include("../Archivos/ArrayGrupo_usuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vista->crear($idiom,TRUE,$form,$usuario,$msg);
          }
  		}
      if(isset($_REQUEST['ModificarView']))
      {
        $origen="Modificar";
        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Usuario();
        $model->buscarUsuario($name);
        include("../Archivos/ArrayBuscarUsuario.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vistas=new Usuario_SHOW();
        $vistas->crear($form,$idiom,$origen);
      }
  		if(isset($_REQUEST['Baja'])){

  				$idiom=new idiomas();
          $model=new Usuario();
          $model->creararrayUsuarios();
          include("../Archivos/ArrayConsultarUsuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
  				$vista=new UsuarioDelete();
  				$vista->crear($idiom,TRUE,$form);

  		}
  		 if (isset($_REQUEST['BajaUsuario']))
  			{

  			$idiom=new idiomas();
  			$usuario=$_REQUEST['BajaUsuario'];
  			$model=new Usuario();
  			$resultado=$model->comprobarusuarios($usuario);
  			if($resultado==TRUE){
          $origen="Baja";
  				$model->eliminarUsuario($usuario);
  				$idiom=new idiomas();
  				$vista=new panel();
  				$vista->constructor($idiom,$origen);
  			}else{
				$idiom=new idiomas();
          $model->creararrayUsuarios();
        include("../Archivos/ArrayConsultarUsuarios.php");
        $arrays=new consult();
        $form=$arrays->array_consultar();
  				$vista=new UsuarioDelete();
  				$vista->crear($idiom,FALSE,$form);
  			}
  			}
        
        if (isset($_REQUEST['BajaShow']))
        {

        $idiom=new idiomas();
        $name=$_POST['buscar'];
        $model=new Usuario();
        $model->buscarUsuario($name);
        include("../Archivos/ArrayBuscarUsuario.php");
        $arrays=new buscar();
        $form=$arrays->array_consultar();
        $vista=new UsuarioDelete();
        $vista->crear($idiom,TRUE,$form);

        }
        if(isset($_REQUEST['View']))
        {  
          $origen="consultar";
          $idiom=new idiomas();
          $usuario=$_REQUEST['View'];
          $model=new Usuario();
          $model->crearArrrayUsuario($usuario);
          include("../Archivos/ArrayUsuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Usuario_VIEW();
          $vistas->crear($form,$idiom,$origen);
        }
        if(isset($_REQUEST['ViewBaja']))
        { 

          $origen="Baja";
          $idiom=new idiomas();
          $usuario=$_REQUEST['ViewBaja'];
          $model=new Usuario();
          $model->crearArrrayUsuario($usuario);
          include("../Archivos/ArrayUsuarios.php");
          $arrays=new consult();
          $form=$arrays->array_consultar();
          $vistas=new Usuario_VIEW();
          $vistas->crear($form,$idiom,$origen);
           }
  			if (isset($_REQUEST['Volver']))
  			{
          $origen="inicio";
  			$idiom=new idiomas();
  			$vista=new panel();
  			$vista->constructor($idiom,$origen);
  			}

  		
?>