<?php
  if(isset($_POST['register'])){
    echo "EXISTE VARIABLE";
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
  <title>SB Admin - Start Bootstrap Template</title>
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
            <input class="form-control" name="nameInputGroup" placeholder="nombre del grupo" >
          </div>
          <div class="form-group">
            <label for="nameGroup">Ciudad</label>
            <input class="form-control" name="cityInputGroup" placeholder="ciudad" >
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="register" value="Registrar"/>
          
          <a class="btn btn-block" href="tablesGroup.html">Cancelar</a>
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