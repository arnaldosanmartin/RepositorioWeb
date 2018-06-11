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
      
      $query="UPDATE Producto SET tipoArticulo='completo', tituloArticulo='$nombre', ciudad='$ciudad', paginaInicial='$PI', paginaFinal='$PI', fecha='$fecha', volumen='$volRev', fasciculoRevista='$fasiculo', serieRevista='$volFas', medioDivulgacion='$medio', sitioWeb='$site', doi='$doi', estado='$actualestado',fechaup='$fechaupdate' WHERE id='$id'";
      
    }else{
      $query="UPDATE Producto SET tipoArticulo='completo', tituloArticulo='$nombre', ciudad='$ciudad',  fechaup='$fechaupdate', estado='$actualestado' WHERE id='$id'";
    }
    
    if ($connection->query($query)=== TRUE) {
      echo "New record created successfully";
      header('Location: tablesArtic.php');
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
      <div class="card-header">Editar articulo</div>
      <div class="card-body">
        <form method="post" action="">
          <?php
          $host= "127.0.0.1";
          $user= "azarot";
          $pass= "";
          $db= "mydb";
          $port= 3306;
          
          $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
          
          $id= $_GET["idart"];
          
          $query= "SELECT * FROM Producto WHERE id = '$id'";
          $result= mysqli_query($connection, $query);
          while ($row= mysqli_fetch_assoc($result)) {
            echo "Estado actual del art&iacute;culo: ".$row['estado']."<br>
                  <td colspan='4' >";
            if($row['estado']==="Publicado"){
              echo "
                    <input type='radio' id='tipoProducto2' name='cod_tipo_producto' value='Enviado'/>Enviado&nbsp;
                    <input type='radio' id='tipoProducto3' name='cod_tipo_producto' value='Cambios'/>Cambios&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Reenviado'/>Reenviado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Rechazado'/>Rechazado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Aceptado'/>Aceptado&nbsp;
                    <input type='radio' id='tipoProducto1' name='cod_tipo_producto' value='Publicado' checked/> Publicado&nbsp;
                    </td><br><br>";
            }
            if($row['estado']==="Enviado"){
              echo "
                    <input type='radio' id='tipoProducto2' name='cod_tipo_producto' value='Enviado' checked/>Enviado&nbsp;
                    <input type='radio' id='tipoProducto3' name='cod_tipo_producto' value='Cambios'/>Cambios&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Reenviado'/>Reenviado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Rechazado'/>Rechazado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Aceptado'/>Aceptado&nbsp;
                    <input type='radio' id='tipoProducto1' name='cod_tipo_producto' value='Publicado'/> Publicado&nbsp;
                    </td><br><br>";
            }
            if($row['estado']==="Cambios"){
              echo "
                    <input type='radio' id='tipoProducto2' name='cod_tipo_producto' value='Enviado'/>Enviado&nbsp;
                    <input type='radio' id='tipoProducto3' name='cod_tipo_producto' value='Cambios' checked/>Cambios&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Reenviado'/>Reenviado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Rechazado'/>Rechazado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Aceptado'/>Aceptado&nbsp;
                    <input type='radio' id='tipoProducto1' name='cod_tipo_producto' value='Publicado'/> Publicado&nbsp;
                    </td><br><br>";
            }
            if($row['estado']==="Rechazado"){
              echo "
                    <input type='radio' id='tipoProducto2' name='cod_tipo_producto' value='Enviado'/>Enviado&nbsp;
                    <input type='radio' id='tipoProducto3' name='cod_tipo_producto' value='Cambios'/>Cambios&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Reenviado'/>Reenviado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Rechazado' checked/>Rechazado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Aceptado'/>Aceptado&nbsp;
                    <input type='radio' id='tipoProducto1' name='cod_tipo_producto' value='Publicado'/> Publicado&nbsp;
                    </td><br><br>";
            }
            if($row['estado']==="Reenviado"){
              echo "
                    <input type='radio' id='tipoProducto2' name='cod_tipo_producto' value='Enviado'/>Enviado&nbsp;
                    <input type='radio' id='tipoProducto3' name='cod_tipo_producto' value='Cambios'/>Cambios&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Reenviado' checked/>Reenviado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Rechazado'/>Rechazado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Aceptado'/>Aceptado&nbsp;
                    <input type='radio' id='tipoProducto1' name='cod_tipo_producto' value='Publicado'/> Publicado&nbsp;
                    </td><br><br>";
            }
            if($row['estado']==="Aceptado"){
              echo "
                    <input type='radio' id='tipoProducto2' name='cod_tipo_producto' value='Enviado'/>Enviado&nbsp;
                    <input type='radio' id='tipoProducto3' name='cod_tipo_producto' value='Cambios'/>Cambios&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Reenviado'/>Reenviado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Rechazado'/>Rechazado&nbsp;
                    <input type='radio' id='tipoProducto4' name='cod_tipo_producto' value='Aceptado' checked/>Aceptado&nbsp;
                    <input type='radio' id='tipoProducto1' name='cod_tipo_producto' value='Publicado'/> Publicado&nbsp;
                    </td><br><br>";
            }
                  
          	
            echo "<div class='form-group'>
                      <label for='nameInputGroup'>Titulo del articulo</label>
                      <input class='form-control' id='nameInputArt' name='nameInputArt' value='".$row['tituloArticulo']."' placeholder='nombre del grupo' required>
                    </div>
                    <div class='form-group'>
                      <div class='form-row'>
                        <div class='col-md-6 cls-completo'>
                          <label for='PIInput'>Pagina inicial</label>
                          <input required class='form-control cls-completo-input' id='PIInput' name='PIInput' value='".$row['paginaInicial']."' type='number' aria-describedby='nameHelp' placeholder='pagina inicial'>
                        </div>
                        <div class='col-md-6 cls-completo'>
                          <label for='PFInput'>Paginal final</label>
                          <input  required class='form-control cls-completo-input' id='PFInput' name='PFInput' value='".$row['paginaFinal']."' type='number' aria-describedby='nameHelp' placeholder='pagina final'>
                        </div>
                      </div>
                    </div>
                    <div class='form-group cls-completo'>
                      <label for='dateInputArt'>Fecha de publicación del articulo</label>
                      <input class='form-control cls-completo-input' id='dateInputArt' value='".$row['fecha']."' name='dateInputArt' type='date' required>
                    </div>
                    <div class='form-group'>
                      <div class='form-row'>
                        <div class='form-control cls-completo'>
                          <label for='volumenInput'>Volumen de revista</label>
                          <input  required class='form-control cls-completo-input' id='volumenInput' name='volumenInput' value='".$row['volumen']."' type='number' aria-describedby='nameHelp' placeholder='volumen'>
                        </div>
                      </div>
                    </div>
                    <div class='form-group'>
                      <div class='form-row'>
                        <div class='col-md-8 cls-completo'>
                          <label for='fasiculoInput'>Fasiculo de revista</label>
                          <input class='form-control cls-completo-input' id='fasiculoInput' name='fasiculoInput' value='".$row['fasciculoRevista']."' type='text' aria-describedby='nameHelp' placeholder='fasiculo de la revista'>
                          <strong>Importante: </strong> Si el art&iacute;culo est&aacute; publicado en una revista que no tiene fasc&iacute;culo ingrese N/A (No Aplica). &nbsp
                        </div>
                        <div class='col-md-4 cls-completo'>
                          <label for='volumenInput'>Serie de revista</label>
                          <input class='form-control cls-completo-input' id='volumenInput' name='volumenfas' value='".$row['serieRevista']."' type='number' aria-describedby='nameHelp' placeholder='volumen'>
                        </div>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label for='cityInputGroup'>Ciudad</label>
                      <input class='form-control' id='cityInput' name='cityInput' value='".$row['ciudad']."' placeholder='ciudad' required>
                    </div>
                    <div class='form-group'>
                      <div class='form-row'>
                        <div class='col-md-6 cls-completo'>
                          <label for='siteInput'>Sitio web (URL)</label>
                          <input class='form-control cls-completo-input' name='siteInput' id='siteInput' value='".$row['sitioWeb']."' type='text' aria-describedby='nameHelp' placeholder='pagina web'>
                        </div>
                        <div class='col-md-6 cls-completo'>
                          <label for='DOIInput'>DOI (Digital Object Identifier)</label>
                          <input class='form-control cls-completo-input' name='DOIInput' id='DOIInput' value='".$row['doi']."' type='text' aria-describedby='nameHelp' placeholder='DOI'>
                        </div>
                      </div>
                    </div>
                    <div class='form-group cls-completo'>
                      <label for='medioInput'>Medio actual de divulgaci&oacute;n: ";
                      
                      if($row['medioDivulgacion']==="electronico"){
                        echo $row['medioDivulgacion']."</label>
                          <select name='medioInput' class='form-control cls-completo-input' id='medioInput' name='medioInput'>
                            <option value='electronico'>Electr&oacute;nico</option>
                            <option value='papel'>Papel</option>
              		        </select>
                        </div>" ;
                      }else{
                        echo $row['medioDivulgacion']."</label>
                          <select name='medioInput' class='form-control cls-completo-input' id='medioInput' name='medioInput'>
                            <option value='papel'>Papel</option>
              		          <option value='electronico'>Electr&oacute;nico</option>
              		        </select>
                        </div>" ;
                      }
                      
          }
          ?>
          
          
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
  <script type="text/javascript">
  
    $(document).ready(function(){
      var estado = $("input[type=radio][name=cod_tipo_producto]:checked").val();
      actualizarForm(estado);
    });
    
    $("input[type=radio][name=cod_tipo_producto]").on("change",function(){
      var estado = $(this).val();
      actualizarForm(estado);
    });
    
    function actualizarForm(estado){
      switch(estado){
        case 'Publicado':
          $(".cls-completo").removeClass("hide");
          $(".cls-completo-input").attr("disabled",false);
          
          $(".cls-corto").addClass("hide");
          $(".cls-corto-input").attr("disabled",true);
          break;
          
        default:
          $(".cls-corto").removeClass("hide");
          $(".cls-corto-input").attr("disabled",false);
          
          $(".cls-completo").addClass("hide");
          $(".cls-completo-input").attr("disabled",true);
      }
    }
  </script>
  
</body>

</html>
