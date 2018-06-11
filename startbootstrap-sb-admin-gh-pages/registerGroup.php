<?php
  session_start();
  if(isset($_SESSION["user_id"])==false){
    header('Location: login.php');
  }else{
    if($_SESSION["user_rol"]!=1){
      header('Location: login.php');
    }
  }
  if(isset($_POST['register'])){
    
    $host= "127.0.0.1";
    $user= "azarot";
    $pass= "";
    $db= "mydb";
    $port= 3306;
    
    $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
      
      $idLider= $_POST['liderInput'];
      $nombre= $_POST['nameInputGroup'];
      $descripcion= $_POST['descripcionInputGroup'];
      $email= $_POST['emailInputGroup'];
      $fecha= $_POST['dateInputGroup'];
      $areaConocimiento= $_POST['areaInputGroup'];
      $ciudad= $_POST['cityInputGroup'];
      $lineaInvestigacion=$_POST['lineaInputGroup'];
      $codigo=$_POST['codInputGroup'];
      $clasificacion=$_POST['statusInputGroup'];
        
    $query= "INSERT INTO Grupo (idLider, nombre, descripcion, email, fecha, areaConocimiento, ciudad, ultimaClasificacion, codigo, clasificacion) VALUES ('$idLider','$nombre','$descripcion','$email','$fecha','$areaConocimiento','$ciudad','$lineaInvestigacion','$codigo','$clasificacion')";
   
    if ($connection->query($query)=== TRUE) {
      echo "New record created successfully";
      header('Location: tablesGroup.php');
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
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registro Grupo</title>
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
      <div class="card-header">Registrar un grupo</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="nameGroup">Nombre del grupo</label>
            <textarea class="form-control" name="nameInputGroup" id="nameInputGroup" placeholder="nombre del grupo" required></textarea>
          </div>
          <div class="form-group">
            <label for="liderInput">Lider del grupo</label>
                <select class="form-control" id="liderInput" name="liderInput" required>
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
                $connection->close();
                ?>
                </select>
          </div>
          <div class="form-group">
            <label for="nameGroup">Correo del grupo</label>
            <input class="form-control" id="emailInputGroup" name="emailInputGroup" type="email" placeholder="email" required>
          </div>
          <div class="form-group">
            <label for="nameGroup">Clasificacion segun colciencias</label>
            <select class="form-control" id="statusInputGroup" name="statusInputGroup" required>
              <option value="A">A</option>
              <option value="A">B</option>
              <option value="A">C</option>
              <option value="A">D</option>
              <option value="No clasificado">No clasificado</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nameGroup">Codigo del grupo</label>
            <input class="form-control" id="codInputGroup" name="codInputGroup" placeholder="codigo" required>
          </div>
          <div class="form-group">
            <label for="nameGroup">Area de conocimiento del grupo</label>
            <input class="form-control" id="areaInputGroup" name="areaInputGroup" placeholder="area de conocimiento" required>
          </div>
          <div class="form-group">
            <label for="nameGroup">Linea de investigacion del grupo</label>
            <input class="form-control" id="lineaInputGroup" name="lineaInputGroup" placeholder="linea de investigacion" required>
          </div>
          <div class="form-group">
            <label for="nameGroup">Fecha de creación del grupo</label>
            <input class="form-control" id="dateInputGroup" name="dateInputGroup" type="date" placeholder="fecha" required>
          </div>
          <div class="form-group">
            <label for="nameGroup">Ciudad</label>
            <input class="form-control" id="cityInputGroup" name="cityInputGroup" placeholder="ciudad" required>
          </div>
          <div class="form-group">
            <label for="nameGroup">Descripcion del grupo</label>
            <input class="form-control" id="descripcionInputGroup" name="descripcionInputGroup" placeholder="ingrese una breve descripcion del grupo" required>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="register" value="Registrar"/>
          <a class="btn btn-block" href="RelGrupo.php">Cancelar</a>
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
