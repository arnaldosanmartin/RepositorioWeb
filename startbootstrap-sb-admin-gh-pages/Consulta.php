<?php
    session_start();
    if(isset($_SESSION["user_id"])==false){
    header('Location: login.php');
  }
    $host= "127.0.0.1";
    $user= "azarot";
    $pass= "";
    $db= "mydb";
    $port= 3306;
    
    $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    mysqli_set_charset($connection,"utf8");
    $table = "";
    $boton="";
    if(isset($_POST['register'])){
        $op=$_POST['horaInput'];
        $thead = "";
        $tbody = "";
        $query="";
        switch ($op) {
            case 1:
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th><th>Departamento</th><th>Grupo</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto,Grupo.nombre as gr,Departamento.nombre as dep
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                LEFT JOIN Relacion_profesor_grupo ON Profesor.id=Relacion_profesor_grupo.idProfesor
                LEFT JOIN Relacion_profesor_departamento ON Profesor.id=Relacion_profesor_departamento.idProfesor
                LEFT JOIN Departamento ON Relacion_profesor_departamento.idDepartamento=Departamento.id
                LEFT JOIN Grupo ON Relacion_profesor_grupo.idGrupo=Grupo.id
                ORDER BY tituloArticulo";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td>
                   <td>" . $row['gr'] . "</td>
                   <td>" . $row['dep'] . "</td></tr>";
                  }
                break;
            case 2:
                $idg=$_POST['grupoInput'];
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th><th>Grupo</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto,Grupo.nombre as gr
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                INNER JOIN Relacion_profesor_grupo ON Profesor.id=Relacion_profesor_grupo.idProfesor
                INNER JOIN Grupo ON Relacion_profesor_grupo.idGrupo=Grupo.id
                WHERE Grupo.id='$idg' ORDER BY gr";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td>
                   <td>" . $row['gr'] . "</td></tr>";
                  }
                break;
            case 3:
                $idd=$_POST['depInput'];
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th><th>Departamento</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto,Departamento.nombre as dep
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                INNER JOIN Relacion_profesor_departamento ON Profesor.id=Relacion_profesor_departamento.idProfesor
                INNER JOIN Departamento ON Relacion_profesor_departamento.idDepartamento=Departamento.id
                WHERE Departamento.id='$idd' ORDER BY dep";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td>
                   <td>" . $row['dep'] . "</td></tr>";
                  }
                break;
            case 4:
                $idp=$_POST['profesorInput'];
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                WHERE Profesor.id='$idp' ORDER BY nombreCompleto";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td></tr>";
                  }
                break;
            case 5:
                $idg=$_POST['grupoInput'];
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th><th>Grupo</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto,Grupo.nombre as gr
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                INNER JOIN Relacion_profesor_grupo ON Profesor.id=Relacion_profesor_grupo.idProfesor
                INNER JOIN Grupo ON Relacion_profesor_grupo.idGrupo=Grupo.id
                WHERE Producto.estado='Publicado' AND Grupo.id='$idg' ORDER BY gr";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td>
                   <td>" . $row['gr'] . "</td></tr>";
                  }
                break;
            case 6:
                $idd=$_POST['depInput'];
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th><th>Departamento</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto,Departamento.nombre as dep
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                INNER JOIN Relacion_profesor_departamento ON Profesor.id=Relacion_profesor_departamento.idProfesor
                INNER JOIN Departamento ON Relacion_profesor_departamento.idDepartamento=Departamento.id
                WHERE Producto.estado='Publicado' AND Departamento.id='$idd' ORDER BY dep";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td>
                   <td>" . $row['dep'] . "</td></tr>";
                  }
                break;
            case 7:
                $idp=$_POST['profesorInput'];
                $thead = "<th>Titulo</th><th>Revista</th><th>Idioma</th><th>Cuartil Scopus</th><th>Cuartil ISI</th><th>Cuartil Colciencias</th>
                <th>Estado</th><th>Fecha publicación</th><th>Pagina Inicial</th><th>Pagina Final</th><th>Volumen</th>
                <th>Fasciculo</th><th>Serie de Revista</th><th>Medio de Divulgación</th><th>WEB</th><th>DOI</th><th>Ciudad</th>
                <th>Profesor</th>";
                
                $query= "SELECT Producto.id,tituloArticulo,Producto.fecha,
                medioDivulgacion,estado,Revista.nombre,doi,sitioWeb,serieRevista,fasciculoRevista,volumen,paginaFinal,paginaInicial,idioma,Producto.ciudad,
                Producto.cuartilScopus,Producto.cuartilIsci,Producto.cuartilIndex,
                nombreCompleto
                FROM Relacion_profesor_producto
                INNER JOIN Producto ON idProducto = Producto.id
                INNER JOIN Revista ON Producto.idRevista = Revista.id
                INNER JOIN Profesor ON Profesor.id=Relacion_profesor_producto.idProfesor
                WHERE Producto.estado='Publicado' AND Profesor.id='$idp' ORDER BY nombreCompleto";
                
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   $tbody.="<tr><td>" . $row['tituloArticulo'] . "</td>
                   <td>" . $row['nombre'] . "</td>
                   <td>" . $row['idioma'] . "</td>
                   <td>" . $row['cuartilScopus'] . "</td>
                   <td>" . $row['cuartilIsci'] . "</td>
                   <td>" . $row['cuartilIndex'] . "</td>
                   <td>" . $row['estado'] . "</td>
                   <td>" . $row['fecha'] . "</td>
                   <td>" . $row['paginaInicial'] . "</td>
                   <td>" . $row['paginaFinal'] . "</td>
                   <td>" . $row['volumen'] . "</td>
                   <td>" . $row['fasciculoRevista'] . "</td>
                   <td>" . $row['serieRevista'] . "</td>
                   <td>" . $row['medioDivulgacion'] . "</td>
                   <td>" . $row['sitioWeb'] . "</td>
                   <td>" . $row['doi'] . "</td>
                   <td>" . $row['ciudad'] . "</td>
                   <td>" . $row['nombreCompleto'] . "</td></tr>";
                  }
                break;
            default:
                $thead = "<th class='text-center'>NO HAY INFORMACION</th>";
                $tbody = "<tr><td class='text-center'>CONSULTA INCORRECTA</td></tr>";
        }
        $table = "<table id='dataTable' class='table table-bordered' width='100%' cellspacing='0'><thead><tr>".$thead."</tr></thead><tbody>".$tbody."</tbody></table>";
    }
    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Tablas de los grupos">
  <meta name="author" content="Aza">
  <title>Consulta</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <!--<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="853788532639-kml0n403m7uunopq9v5mqt7lc89nq5to.apps.googleusercontent.com">
  <style type="text/css">
      .dataTables_wrapper{
          width: 100%;
      }
  </style>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="Home.php">Home</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text"><font color="white">Profesores</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="Perfil.php"><font color="white">Mi perfil</font></a>
            </li>
            <li>
              <a href="tablesMisGroup.php"><font color="white">Mis grupos</font></a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"><font color="white">Art&iacute;culos</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="BusquedaArt.php"><font color="white">Buscar art&iacute;culos</font></a>
            </li>
            <li>
              <a href="tablesArtic.php"><font color="white">Mis art&iacute;culos</font></a>
            </li>
            <li>
              <a href="registerArticulo.php"><font color="white">Registrar art&iacute;culos</font></a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text"><font color="white">Administraci&oacute;n</font></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages2">
            <?php
              if($_SESSION["user_rol"]==1){
                echo "<li>
                        <a href='RelGrupo.php'><font color='white'>Relacionar con grupos</font></a>
                      </li>
                      <li>
                        <a href='RelDept.php'><font color='white'>Relacionar con departamentos</font></a>
                      </li>
                      <li>
                        <a href='Profesores.php'><font color='white'>Registrar profesores</font></a>
                      </li>
                      <li>
                        <a href='Revistas.php'><font color='white'>Administrar revistas</font></a>
                      </li>";
              }
            ?>
            <li>
              <a href="Consulta.php"><font color="white">Consultas</font></a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="tablesGroup.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text"><font color="white">Grupos de investigaci&oacute;n</font></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="Perfil.php">
            <?php echo $_SESSION["user_name"]; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><font color="white">Cerrar sesi&oacute;n</font></a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="Home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Consulta</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-search"></i> Consulta <button onclick="doit('xlsx');" class="btn btn-primary pull-right">Descargar Excel</button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <form method="post" action="">
              <div class="form-group">
                <label for="horaInput">Consulta</label>
                <select class="form-control" id="horaInput" name="horaInput" required>
                    <option value="1">Tabla Maestra</option>
                    <option value="2">Articulos por Grupo</option>
                    <option value="3">Articulos por Departamento</option>
                    <option value="4">Articulos por Profesor</option>
                    <option value="5">Publicados por Grupo</option>
                    <option value="6">Publicados por Departamento</option>
                    <option value="7">Publicados por Profesor</option>
                    
                    
                </select>
              </div>
              
              <label class="cls-grupos" for="grupoInput">Listado de grupos</label>
              <select class="form-control cls-grupos-input" id="grupoInput" name="grupoInput" required>
              <?php
              $host= "127.0.0.1";
              $user= "azarot";
              $pass= "";
              $db= "mydb";
              $port= 3306;
              
              $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
              mysqli_set_charset($connection,"utf8");
              $query= "SELECT * FROM Grupo";
              $result= mysqli_query($connection, $query);
              while ($row= mysqli_fetch_assoc($result)) {
               echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
              }
              
              $connection->close();
              ?>
              </select>
              
              <label class="cls-departamentos" for="depInput">Listado de departamentos</label>
              <select class="form-control cls-departamentos-input" id="depInput" name="depInput" required>
              <?php
              $host= "127.0.0.1";
              $user= "azarot";
              $pass= "";
              $db= "mydb";
              $port= 3306;
              
              $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
              mysqli_set_charset($connection,"utf8");
              $query= "SELECT * FROM Departamento";
              $result= mysqli_query($connection, $query);
              while ($row= mysqli_fetch_assoc($result)) {
               echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
              }
              
              $connection->close();
              ?>
              </select>
              
              <label class="cls-profesores" for="profesorInput">Listado de profesores</label>
              <select class="form-control cls-profesores-input" id="profesorInput" name="profesorInput" required>
              <?php
              
              $host= "127.0.0.1";
              $user= "azarot";
              $pass= "";
              $db= "mydb";
              $port= 3306;
              
              $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
              
              $query= "SELECT * FROM Profesor";
              $result= mysqli_query($connection, $query);
              while ($row= mysqli_fetch_assoc($result)) {
               echo "<option value='".$row['id']."'>".$row['nombreCompleto']."</option>";
              }
              ?>
              </select>
              <br></br>
              <input class="btn btn-primary pull-right" type="submit" name="register" value="Consultar">

            </form>
        
          </div>
          <br><br>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Reporte
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php echo $table; ?>
                <br>
               
              </div>
            </div>
          </div>
         <a class="btn " href="ConsultaAv.php">Opción avanzada</a>
        </div>
        <div class="card-footer small text-muted">Actualizado a las 11:59 PM</div>
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Seguro de cerrar sesión?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Presione "Salir", si esta seguro de cerrar sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a onclick="signOut();" class="btn btn-primary" href="#">Salir</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!--<script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>-->
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>
    <script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script>
        function doit(type, fn, dl) {
	        var elt = document.getElementById('dataTable');
	        var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
	        return dl ? XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) : XLSX.writeFile(wb, fn || ('Consulta.' + (type || 'xlsx')));
        }
    
      function onLoad() {
        gapi.load('auth2', function() {
          gapi.auth2.init();
          /*if (gapi.auth2.getAuthInstance().isSignedIn.get()) {
            var profile = gapi.auth2.getAuthInstance().currentUser.get().getBasicProfile();
            console.log('ID: ' + profile.getId());
            console.log('Full Name: ' + profile.getName());
            console.log('Given Name: ' + profile.getGivenName());
          }*/
          //updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        });
      }
      
      /*function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
          console.log("OK");
        } else {
          console.log("OK NOT");
        }
      }*/
      
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          window.location.href = "login.php";
        });
      }
    </script>
    <script type="text/javascript">
  
    $(document).ready(function(){
      var estado = $("select[name=horaInput]").val();
      actualizarForm(estado);
    });
    
    $("select[name=horaInput]").on("change",function(){
      var estado = $(this).val();
      actualizarForm(estado);
    });
    
    function actualizarForm(estado){
      switch(estado){
        case '2':
          $(".cls-grupos").removeClass("hide");
          $(".cls-grupos-input").attr("disabled",false);
          $(".cls-grupos-input").removeClass("hide");
          
          $(".cls-departamentos").addClass("hide");
          $(".cls-departamentos-input").attr("disabled",true);
          $(".cls-departamentos-input").addClass("hide");
          
          $(".cls-profesores").addClass("hide");
          $(".cls-profesores-input").attr("disabled",true);
          $(".cls-profesores-input").addClass("hide");
          break;
        case '3':
          $(".cls-grupos").addClass("hide");
          $(".cls-grupos-input").attr("disabled",true);
          $(".cls-grupos-input").addClass("hide");
          
          $(".cls-departamentos").removeClass("hide");
          $(".cls-departamentos-input").attr("disabled",false);
          $(".cls-departamentos-input").removeClass("hide");
          
          $(".cls-profesores").addClass("hide");
          $(".cls-profesores-input").attr("disabled",true);
          $(".cls-profesores-input").addClass("hide");
          break;
          case '4':
          $(".cls-grupos").addClass("hide");
          $(".cls-grupos-input").attr("disabled",true);
          $(".cls-grupos-input").addClass("hide");
       
          $(".cls-departamentos").addClass("hide");
          $(".cls-departamentos-input").attr("disabled",true);
          $(".cls-departamentos-input").addClass("hide");
          
          $(".cls-profesores").removeClass("hide");
          $(".cls-profesores-input").attr("disabled",false);
           $(".cls-profesores-input").removeClass("hide");
          break;
          case '5':
          $(".cls-grupos").removeClass("hide");
          $(".cls-grupos-input").attr("disabled",false);
          $(".cls-grupos-input").removeClass("hide");
          
          $(".cls-departamentos").addClass("hide");
          $(".cls-departamentos-input").attr("disabled",true);
          $(".cls-departamentos-input").addClass("hide");
          
          $(".cls-profesores").addClass("hide");
          $(".cls-profesores-input").attr("disabled",true);
          $(".cls-profesores-input").addClass("hide");
          break;
        case '6':
          $(".cls-grupos").addClass("hide");
          $(".cls-grupos-input").attr("disabled",true);
          $(".cls-grupos-input").addClass("hide");
          
          $(".cls-departamentos").removeClass("hide");
          $(".cls-departamentos-input").attr("disabled",false);
          $(".cls-departamentos-input").removeClass("hide");
          
          $(".cls-profesores").addClass("hide");
          $(".cls-profesores-input").attr("disabled",true);
          $(".cls-profesores-input").addClass("hide");
          break;
          case '7':
          $(".cls-grupos").addClass("hide");
          $(".cls-grupos-input").attr("disabled",true);
          $(".cls-grupos-input").addClass("hide");
       
          $(".cls-departamentos").addClass("hide");
          $(".cls-departamentos-input").attr("disabled",true);
          $(".cls-departamentos-input").addClass("hide");
          
          $(".cls-profesores").removeClass("hide");
          $(".cls-profesores-input").attr("disabled",false);
           $(".cls-profesores-input").removeClass("hide");
          break; 
        default:
          $(".cls-grupos").addClass("hide");
          $(".cls-grupos-input").attr("disabled",true);
          $(".cls-grupos-input").addClass("hide");
          
          $(".cls-departamentos").addClass("hide");
          $(".cls-departamentos-input").attr("disabled",true);
          $(".cls-departamentos-input").addClass("hide");
          
          $(".cls-profesores").addClass("hide");
          $(".cls-profesores-input").attr("disabled",true);
          $(".cls-profesores-input").addClass("hide");
      }
    }
  </script>
  </div>
</body>

</html>