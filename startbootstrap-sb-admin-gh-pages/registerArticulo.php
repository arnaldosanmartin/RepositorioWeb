<?php
  session_start();
  if(isset($_SESSION["user_id"])==false){
    header('Location: login.php');
  }
  $iduser= $_SESSION["user_id"];
  if(isset($_POST['register'])){
    
    $host= "127.0.0.1";
    $user= "azarot";
    $pass= "";
    $db= "mydb";
    $port= 3306;
    
    $nombre= $_POST['nameInputArt'];
    $idioma= $_POST['sgl_idioma'];
    $revista= $_POST['revistaInput'];
    $fechaupdate= date("Y-m-d");
    $actualestado=$_POST['cod_tipo_producto'];
    $ciudad=$_POST['cityInput'];
    $PI= "0";
    $PF= "0";
    $volRev= "0";
    $fasiculo= "N/A";
    $volFas= "0";
    $site= "0";
    $doi= "0";
    $medio= "ninguno";
    $fecha="1";
    $cuartilScopus = "";
    $cuartilIsci = "";
    $cuartilIndex = "";
    $tipo="completo";
    
    $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    $query= "SELECT * FROM Revista WHERE id = '$revista'";
    $result= mysqli_query($connection, $query);
     if ($row= mysqli_fetch_assoc($result)) {
        $cuartilScopus = $row['cuartilScopus'];
        $cuartilIsci = $row['cuartilIsci'];
        $cuartilIndex = $row['cuartilIndex'];
      }else{
        echo "Error: " . $query . "<br>" . $conn->error;
      }
      
    if($actualestado==="Publicado"){
      $PI= $_POST['PIInput'];
      $PF= $_POST['PFInput'];
      $volRev= $_POST['volumenInput'];
      $fasiculo= $_POST['fasiculoInput'];
      $volFas= $_POST['volumenfas'];
      $site= $_POST['siteInput'];
      $doi= $_POST['DOIInput'];
      $medio= $_POST['medioInput'];
      $fecha=$_POST['dateInputArt'];
    }
    
    $query="INSERT INTO Producto (tipoArticulo, tituloArticulo, ciudad, paginaInicial, paginaFinal , idioma, fecha, fechaup, idRevista, volumen, fasciculoRevista, serieRevista, medioDivulgacion, sitioWeb, doi, estado,cuartilScopus,cuartilIsci,cuartilIndex) 
      VALUES ('$tipo' ,'$nombre', '$ciudad','$PI','$PF','$idioma','$fecha','$fechaupdate','$revista','$volRev','$fasiculo','$volFas','$medio','$site','$doi','$actualestado','$cuartilScopus','$cuartilIsci','$cuartilIndex')";
    if ($connection->query($query)=== TRUE) {
      $last_id = $connection->insert_id;
      $query= "INSERT INTO Relacion_profesor_producto (idProfesor, idProducto) VALUES ('$iduser','$last_id')";
        if ($connection->query($query)=== TRUE) {
          header('Location: tablesArtic.php');
        } else {
        echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
    echo "Error: " . $query . "<br>" . $conn->error;
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
  <title>Articulos</title>
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
      <div class="card-header">Registrar un Articulo</div>
      <div class="card-body">
        <form method="post" action="">
          Estado del art&iacute;culo: <br>
          <td colspan="4" >
            <input type="radio" id="tipoProducto2" name="cod_tipo_producto" value='Enviado' checked="checked"/>Enviado&nbsp;
            </td><br><br>
          <div class="form-group">
            <label for="nameInputGroup">Titulo del articulo</label>
            <input class="form-control" id="nameInputArt" name="nameInputArt" placeholder="nombre del articulo" required>
          </div>
          <div class="form-group">
            <label for="idiomaInput">Idioma:</label>
            <select class="form-control" id="idiomaInput" name="sgl_idioma" required>
            <option value="ES">Espa&ntilde;ol</option>
            <option value="DE">Alem&aacute;n</option>
            <option value="ZH">Chino</option>
            <option value="FR">Franc&eacute;s</option>
            <option value="IW">Hebreo</option>
            <option value="NL">Holand&eacute;s</option>
            <option value="EN">Ingl&eacute;s</option>
            <option value="IT">Italiano</option>
            <option value="JA">Japon&eacute;s</option>
            <option value="LA">Lat&iacute;n</option>
            <option value="PT">Portugu&eacute;s</option>
            <option value="QU">Quechua</option>
            <option value="RO">Rumano</option>
            <option value="RU">Ruso</option>
            <option value="TH">Tailand&eacute;s</option>
            </select>
          </div>
  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <label for="revistaInput">Revista</label>
                <select class="form-control" id="revistaInput" name="revistaInput" required>
                <?php
                $host= "127.0.0.1";
                $user= "azarot";
                $pass= "";
                $db= "mydb";
                $port= 3306;
                
                $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
                
                
                $query= "SELECT * FROM Revista";
                $result= mysqli_query($connection, $query);
                  while ($row= mysqli_fetch_assoc($result)) {
                   echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                  }
                $connection->close();
                ?>
                </select>
              </div>
            
            </div>
          </div>

          <div class="form-group">
            <label for="cityInputGroup">Ciudad</label>
            <input class="form-control" id="cityInput" name="cityInput" placeholder="ciudad">
          </div>
          <div class="form-group">

          <div class="form-group">
            <label >Los autores son añadidos en la pantalla del detalle</label>
          </div>
          <input class="btn btn-primary btn-block" type="submit" id="register" name="register" value="Registrar"/>
          <a class="btn btn-block" href="tablesArtic.php">Cancelar</a>
        </form>
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
