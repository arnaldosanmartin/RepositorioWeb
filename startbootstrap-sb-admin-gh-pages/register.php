<?php
  $host= "127.0.0.1";
  $user= "azarot";
  $pass= "";
  $db= "mydb";
  $port= 3306;
  
  $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
   if(isset($_POST['register'])){
     
     $nombre=$_GET['name'];
     $email=$_GET['email'];
     
     $titulo = $_POST['tituloInput'];
     $nomref = $_POST['nombrerefInput'];
     $naci = $_POST['nacioInput'];
     $tip = $_POST['tipoInput'];
     $doc = $_POST['docInput'];
     $gen = $_POST['genInput'];
     $est = $_POST['estInput'];
     $rol=2;
     
     $query= "SELECT * FROM Profesor WHERE email = '$email'";
     $result= mysqli_query($connection, $query);
     if ($row= mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["user_id"] = $row['id'];
        header('Location: Perfil.php');
      }else{
        $query= "INSERT INTO Profesor (nombreCompleto, titulo, nombreReferencia, nacionalidad, tipoDocumento, documento, genero, estadoCivil, email, rol) 
        VALUES ('$nombre','$titulo','$nomref','$naci','$tip','$doc','$gen','$est','$email','$rol')";
        if ($connection->query($query)=== TRUE) {
          header('Location: login.php');
        } else {
        echo "Error: " . $query . "<br>" . $conn->error;
        }
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
      <div class="card-header">Registrar una cuenta</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="tipoInput">Tipo de documento</label>
                <select required class="form-control" id="tipoInput" name="tipoInput">
                <option value="CC">Cedula de ciudadania</option>
                <option value="PA">Pasaporte</option>
                <option value="CE">Cedula de extranjeria</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="docInput">Numero de documento</label>
                <input  required class="form-control" id="docInput" name="docInput" type="number">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="nombrerefInput">Nombre de referencia</label>
            <input required class="form-control" id="nombrerefInput" name="nombrerefInput" type="text">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="tituloInput">Titulo</label>
                <input required class="form-control" id="tituloInput" name="tituloInput" type="text">
              </div>
              <div class="col-md-6">
                <label for="nacioInput">Nacionalidad</label>
                <input required class="form-control" id="nacioInput" name="nacioInput" type="text">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="genInput">Genero</label>
                <select required class="form-control" id="genInput" name="genInput">
                <option value="Masculino">M</option>
                <option value="Femenino">F</option>
                <option value="Indefenido">Otros.</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="estInput">Estado civil</label>
                <input required class="form-control" id="estInput" name="estInput" type="text">
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" href="#" value="Registrar" name="register"/>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
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
