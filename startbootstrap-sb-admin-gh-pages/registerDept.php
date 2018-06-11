<?php
  session_start();
  if(isset($_SESSION["user_id"])==false){
    header('Location: login.php');
  }else{
    if($_SESSION["user_rol"]!=1){
      header('Location: login.php');
    }
  }
  $host= "127.0.0.1";
  $user= "azarot";
  $pass= "";
  $db= "mydb";
  $port= 3306;
  
  $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
   if(isset($_POST['register'])){
     
     $nombre = $_POST['nombredep'];
     $inst = $_POST['nombreinst'];
     $lider = $_POST['profesorInput'];
     
     $query= "INSERT INTO Departamento (nombre, institucion, idDirector) VALUES ('$nombre','$inst','$lider')";
     if ($connection->query($query)=== TRUE) {
        header('Location: RelDept.php');

      } else {
      echo "Error: " . $query . "<br>" . $conn->error;
      }
     
   }
  $connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registrar</title>
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
      <div class="card-header">Registrar un departamento</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="nombredep">Nombre del departamento</label>
            <input required class="form-control" id="nombredep" name="nombredep" type="text">
          </div>
          <div class="form-group">
            <label for="nombreinst">Nombre de la institución</label>
            <input required class="form-control" id="nombreinst" name="nombreinst" type="text">
          </div>
          <div class="form-group">
            <div class="form-row">
              <label for="profesorInput">Director de departamento</label>
              <select class="form-control" id="profesorInput" name="profesorInput" required>
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
          </div>
          <input type="submit" class="btn btn-primary btn-block" href="#" value="Registrar" name="register"/>
        </form>
        <div class="text-center">
          <a class="btn btn-block" href="RelDept.php">Cancelar</a>
        </div>
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
