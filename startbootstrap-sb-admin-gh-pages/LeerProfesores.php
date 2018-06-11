<?php
  session_start();
  if(isset($_SESSION["user_id"])==false){
    header('Location: login.php');
  }
	include ('PHPExcel/PHPExcel/IOFactory.php'); //Agregamos la librería 

    $host= "127.0.0.1";
    $user= "azarot";
    $pass= "";
    $db= "mydb";
    $port= 3306;
    $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
  
    if(isset($_POST['submit'])){
      $file = $_FILES['file'];
      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_size = $file['size'];
      $file_ext = explode('.',$file_name);
      $file_ext = strtolower(end($file_ext));
    }
   
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    
    $objPHPExcel = PHPExcel_IOFactory::load($target_file);
    //Asigno la hoja de calculo activa
  	$objPHPExcel->setActiveSheetIndex(0);
  	//Obtengo el numero de filas del archivo
  	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
  	
  	
    for ($i = 2; $i <= $numRows; $i++) {
		    $doc = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
    		$nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
    		$titulo = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
    		$nacionalidad = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
    		$tipodoc = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
    		$genero = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
    		$estadocivil = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
    		$nombreref = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
    		$email = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
    		
    	    $query= "SELECT * FROM Profesor WHERE documento = '$doc'";
            $result= mysqli_query($connection, $query);
            
         if ($row= mysqli_fetch_assoc($result)) {
            $query = "UPDATE Profesor SET documento='$doc', nombreCompleto='$nombre', titulo='$titulo', nacionalidad='$nacionalidad'
            , tipoDocumento='$tipodoc', genero='$genero', estadoCivil='$estadocivil', nombreReferencia='$nombreref', email='$email', rol=2 WHERE documento='".$row['documento']."'";
        		if ($connection->query($query)=== TRUE) {
            } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            }
          }else{
            $query = "INSERT INTO Profesor (documento,nombreCompleto,titulo,nacionalidad,tipoDocumento,genero,estadoCivil,nombreReferencia,email,rol)
            VALUES ('$doc','$nombre','$titulo','$nacionalidad','$tipodoc','$genero','$estadoCivil','$nombreref','$email',2)";
        		if ($connection->query($query)=== TRUE) {
              
            } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            }
          }
    }
  
     /*   $query2= "SELECT issn FROM Revista";
        $result2= mysqli_query($connection, $query2);
        while ($row2= mysqli_fetch_assoc($result2)) {
            $issn2 = $row2['issn']; 
            for ($i = 2; $i <= $numRows; $i++) {
                $issn = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                if($issn2 === $issn){
                    break;
                }elseif($i >= $numRows){
                    $query = "UPDATE Revista SET cuartilIndex='' WHERE issn='".$issn2."'";
                	if ($connection->query($query)=== TRUE) {
                    } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                    }
                }
            }
        }*/

    
	$connection->close();
	header('Location: Profesores.php');
?>