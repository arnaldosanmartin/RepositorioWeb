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
  
  $tbody = "";
  $theadScopus = "<th>Documento</th><th>Nombre completo</th><th>Titulo (Grado academico)</th><th>Nacionalidad</th>
  <th>Tipo de documento</th><th>Genero</th><th>Estado civil</th><th>Nombre referencia</th><th>Email</th>";
  $tableScopus = "<table id='tbScopus' class='table'><thead><tr>".$theadScopus."</tr></thead><tbody>".$tbody."</tbody></table>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Tablas de los grupos">
  <meta name="author" content="Aza">
  <title>Profesores</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
        <li class="breadcrumb-item active">Profesores</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <form method="post" action=""> 
              <i class="fa fa-table"></i> Cargar profesores desde una hoja de Excel <br></br>
            </form>
            <form action="LeerProfesores.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
               <div class="form-row">
                <div class="col-md-4" >
                 <input type="file" class="btn" style="border-width: 1px; border-color:  grey;" name="file" id="file">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-md-7" >
                  <input type="submit" class="btn btn-primary" value="Importar tabla de profesores" name="submit">
                  <div class="form-row">
                </div>
                </div>
              </div>
            </div>
          </form>
          <strong>Nota: </strong> Para importar profesores desde un archivo Excel la hoja debe estar diligenciada siguiendo el formato especificado: <br></br>
          <div class="form-row" >
            <button onclick="doitScopus('xlsx');" class="btn btn-primary pull-left">Descargar formato de tabla profesores</button> &nbsp;
          </div>
                
        <div class="card-body">
          <div class="table-responsive">
            
            <div class="card-header">
              <i class="fa fa-table"></i> Tabla de profesores registrados </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre completo</th>
                      <th>Titulo (Grado academico)</th>
                      <th>Genero</th>
                      <th>Nombre referencia</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query= "SELECT nombreCompleto, titulo, genero, nombreReferencia, email FROM Profesor";
                        $result= mysqli_query($connection, $query);
                        while ($row= mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row['nombreCompleto'] . "</td><td>" . $row['titulo']."</td>
                           <td>" . $row['genero'] . "</td> <td>" . $row['nombreReferencia'] . "</td><td>" . $row['email']."</td>
                           </tr>" ;
                          }
                       //$connection->close();
                    ?>
                      
                  </tbody>
                </table>
              </div>
            </div>
           <div hidden> 
            <?php echo $tableScopus;?>
           </div>
          </div>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>
    <script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script>
      function doitScopus(type, fn, dl) {
        
	        var elt = document.getElementById('tbScopus');
	        var wb = XLSX.utils.table_to_book(elt, {sheet:"Profesores"});
	        return dl ? XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) : XLSX.writeFile(wb, fn || ('Formato_Profesores.' + (type || 'xlsx')));
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
  </div>
</body>

</html>
