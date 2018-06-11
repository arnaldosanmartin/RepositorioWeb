<?php
  session_start();
  if(isset($_SESSION["user_id"])==false){
    header('Location: login.php');
  }
  if(isset($_POST['register'])){
    
    $host= "127.0.0.1";
    $user= "azarot";
    $pass= "";
    $db= "mydb";
    $port= 3306;
    
    $id=$_GET['idart'];
    $nombre= $_POST['nameInputArt'];
    $fechaupdate= date("Y-m-d");
    $actualestado=$_POST['cod_tipo_producto'];
    $ciudad=$_POST['cityInput'];
    
    $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
      
    $idart= $_GET["idArt"];
    $idpro= $_POST['autorInput'];
    $query= "DELETE FROM Relacion_profesor_producto WHERE id = '$idpro' ";
    if ($connection->query($query)=== TRUE) {
      
    }
    
    $connection->close();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Registro de articulos">
  <meta name="author" content="Aza">
  <title>Autores</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><i class="fa fa-table"></i> Tabla de autores</div>
      <div class="card-body">
        <?php
        $host= "127.0.0.1";
        $user= "azarot";
        $pass= "";
        $db= "mydb";
        $port= 3306;
        
        $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
        
        $id= $_GET["idArt"];
        ?>
        <div class="card-header">
            <div class="form-group" >
              <form method="post" action="">
                <i class="fa"></i>
                <input class="btn btn-primary pull-right" type="submit" name="register" value="Eliminar autor">
                <select class="btn" style="border-width: 1px; border-color:  black;" id="autorInput" name="autorInput" required>
                <?php
                $idprof= $_SESSION["user_id"];
                $query= "SELECT Relacion_profesor_producto.id,nombreCompleto FROM Relacion_profesor_producto INNER JOIN Profesor ON idProfesor = Profesor.id  WHERE idProducto = '$id' AND idProfesor<>'$idprof'";
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   echo "<option value='".$row['id']."'>".$row['nombreCompleto']."</option>";
                  }
                  
                ?>
                </select>
              </form>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="" width="100%" cellspacing="0"><!--id="dataTable"-->
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Documento</th>
                    <th>Correo electronico</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $query= "SELECT * FROM Relacion_profesor_producto INNER JOIN Profesor ON idProfesor = Profesor.id  WHERE idProducto = '$id'";
                      $result= mysqli_query($connection, $query);
                      while ($row= mysqli_fetch_assoc($result)) {
                          echo "<tr><td><a href='PerfilBusqueda.php?idDocente=".$row['idProfesor']."'>" . $row['nombreCompleto'] . "</a></td> <td>" . $row['nombreReferencia']."</td>
                         <td>" . $row['tipoDocumento']." / ".  $row['documento'] . "</td> <td>" . $row['email'] . "</td> </tr>" ;
                        }
                      $connection->close();
                  ?>
                    
                </tbody>
              </table>
            </div>
          </div>
        <a class="btn btn-block" href="tablesArtic.php">Atrás</a>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
</body>

</html>
