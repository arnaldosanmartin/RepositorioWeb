<?php
  session_start();
  $host= "127.0.0.1";
    $user= "azarot";
    $pass= "";
    $db= "mydb";
    $port= 3306;
    
    $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    $arraymeses= array();
    $arraymeses[0]= 'Enero';
    $arraymeses[1]= 'Febrero';
    $arraymeses[2]= 'Marzo';
    $arraymeses[3]= 'Abril';
    $arraymeses[4]= 'Mayo';
    $arraymeses[5]= 'Junio';
    $arraymeses[6]= 'Julio';
    $arraymeses[7]= 'Agosto';
    $arraymeses[8]= 'Septiembre';
    $arraymeses[9]= 'Octubre';
    $arraymeses[10]= 'Noviembre';
    $arraymeses[11]= 'Diciembre';
    $arraypublicados1 = array();
    $arraypublicados1[0] = 0;
    $arraypublicados1[1] = 0;
    $arraypublicados1[2] = 0;
    $arraypublicados1[3] = 0;
    $arraypublicados1[4] = 0;
    $arraypublicados1[5] = 0;
    $arraypublicados1[6] = 0;
    $arraypublicados1[7] = 0;
    $arraypublicados1[8] = 0;
    $arraypublicados1[9] = 0;
    $arraypublicados1[10] = 0;
    $arraypublicados1[11] = 0;
    $arrayrechazados1 = array();
    $arrayrechazados1[0] = 0;
    $arrayrechazados1[1] = 0;
    $arrayrechazados1[2] = 0;
    $arrayrechazados1[3] = 0;
    $arrayrechazados1[4] = 0;
    $arrayrechazados1[5] = 0;
    $arrayrechazados1[6] = 0;
    $arrayrechazados1[7] = 0;
    $arrayrechazados1[8] = 0;
    $arrayrechazados1[9] = 0;
    $arrayrechazados1[10] = 0;
    $arrayrechazados1[11] = 0;
    $anio = '2018';
    if(isset($_POST['submit']) ){
      $anio= $_POST['year'];
    }
    
    $query= "select count(id) as total, fecha from Producto where estado = 'Publicado' group by year(fecha), month(fecha);";
    $result= mysqli_query($connection, $query);
    while ($arr= mysqli_fetch_array($result)) {
      if($arr['fecha']>=$anio.'-01-01' and $arr['fecha']<= $anio.'-01-31'){
        $arraypublicados1[0] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-02-01' and $arr['fecha']<= $anio.'-02-31'){
        $arraypublicados1[1] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-03-01' and $arr['fecha']<= $anio.'-03-31'){
        $arraypublicados1[2] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-04-01' and $arr['fecha']<= $anio.'-04-31'){
        $arraypublicados1[3] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-05-01' and $arr['fecha']<= $anio.'-05-31'){
        $arraypublicados1[4] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-06-01' and $arr['fecha']<= $anio.'-06-31'){
        $arraypublicados1[5] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-07-01' and $arr['fecha']<= $anio.'-07-31'){
        $arraypublicados1[6] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-08-01' and $arr['fecha']<= $anio.'-08-31'){
        $arraypublicados1[7] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-09-01' and $arr['fecha']<= $anio.'-09-31'){
        $arraypublicados1[8] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-10-01' and $arr['fecha']<= $anio.'-10-31'){
        $arraypublicados1[9] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-11-01' and $arr['fecha']<= $anio.'-11-31'){
        $arraypublicados1[10] = $arr['total'];
      }elseif($arr['fecha']>=$anio.'-12-01' and $arr['fecha']<= $anio.'-12-31'){
        $arraypublicados1[11] = $arr['total'];
      }
      
    $query2= "select count(id) as total, fechaup from Producto where estado = 'Rechazado' group by year(fechaup), month(fechaup);";
    $result2= mysqli_query($connection, $query2);
    while ($arr= mysqli_fetch_array($result2)) {
      if($arr['fechaup']>=$anio.'-01-01' and $arr['fechaup']<= $anio.'-01-31'){
        $arrayrechazados1[0] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-02-01' and $arr['fechaup']<= $anio.'-02-31'){
        $arrayrechazados1[1] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-03-01' and $arr['fechaup']<= $anio.'-03-31'){
        $arrayrechazados1[2] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-04-01' and $arr['fechaup']<= $anio.'-04-31'){
        $arrayrechazados1[3] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-05-01' and $arr['fechaup']<= $anio.'-05-31'){
        $arrayrechazados1[4] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-06-01' and $arr['fechaup']<= $anio.'-06-31'){
        $arrayrechazados1[5] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-07-01' and $arr['fechaup']<= $anio.'-07-31'){
        $arrayrechazados1[6] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-08-01' and $arr['fechaup']<= $anio.'-08-31'){
        $arrayrechazados1[7] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-09-01' and $arr['fechaup']<= $anio.'-09-31'){
        $arrayrechazados1[8] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-10-01' and $arr['fechaup']<= $anio.'-10-31'){
        $arrayrechazados1[9] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-11-01' and $arr['fechaup']<= $anio.'-11-31'){
        $arrayrechazados1[10] = $arr['total'];
      }elseif($arr['fechaup']>=$anio.'-12-01' and $arr['fechaup']<= $anio.'-12-31'){
        $arrayrechazados1[11] = $arr['total'];
      }
    }
    }
                
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Tablas de los grupos">
  <meta name="author" content="Aza">
  <title>Home</title>
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
          <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text"><font color="white">Profesores</font></span>
          </a>
          <ul class="sidenav-second-level collapse show" id="collapseMulti">
            <li>
              <a href="Perfil.php"><font color="white">Mi perfil</font></a>
            </li>
            <li>
              <a href="tablesMisGroup.php"><font color="white">Mis grupos</font></a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"><font color="white">Art&iacute;culos</font></span>
          </a>
          <ul class="sidenav-second-level collapse show" id="collapseExamplePages">
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
          <a href="#">Home</a>
        </li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <form method="post" action="">
            <i class="fa "></i>Articulos publicados/rechazados durante el año <input type="text" class="btn text-left" name="year" style="width: 70px; border-width: 1px; border-color:  grey;"> 
            &nbsp;&nbsp;<input type="submit" class="btn btn-primary" value="Generar" name="submit" id="submit">
          </form>        
        </div>
        <div class="card-body" >
          <div id="curve_chart" style="width: 1500px; height: 400px; padding-right: 500px"></div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
              <i class="fa fa-table"></i> Articulos recientes 
        </div>
           
        <div class="card-body">
          <div class="table-responsive">
            <?php
                
                $query= "SELECT * FROM Producto ORDER BY fechaup DESC limit 5";
                
                $result= mysqli_query($connection, $query);
                while ($row= mysqli_fetch_assoc($result)) {
                    echo "<div class='card-body'><p><a href='ArticuloB.php?idArt=".$row['id']."'>" . $row['tituloArticulo'] . "</a> <a class='pull-right'> " . $row[''] . " </a>  <a class='pull-right'> Fecha de actualizacion: " . $row['fechaup'] . " <br> </a></p></div>";
                }
                $connection->close();
                ?>
          </div>
        </div>
        <div class="card-footer small text-muted">Actualizado a las 11:59 PM</div>
      </div>
      
 
    
    </div>
    <!-- /está bien.container-fluid-->
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
          <div class="modal-body">Presione
          "Salir", si esta seguro de cerrar sesión.</div>
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
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Publicados', 'Rechazados'],
          <?php
          for ($i=0; $i<=11; $i++){
          ?>
            ['<?php echo $arraymeses[$i]?>',<?php echo $arraypublicados1[$i];?>, <?php echo $arrayrechazados1[$i];?>],
          <?php } ?>
          ]);

  
        var options = {
          title: 'Artículos de investigación del año <?php echo $anio; ?>' ,
        
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </div>
</body>

</html>