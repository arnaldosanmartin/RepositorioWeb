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
      $actualdb=$_POST['cod_db'];
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
  	
  	if($actualdb==="Scopus"){
        for ($i = 2; $i <= $numRows; $i++) {
    		    $rank = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        		$nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        		$tipo = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        		$issn = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        		$sjr = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        		$cuartilScopus = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        		
        		$query= "SELECT * FROM Revista WHERE issn = '$issn'";
            $result= mysqli_query($connection, $query);
             if ($row= mysqli_fetch_assoc($result)) {
                $query = "UPDATE Revista SET rank='$rank', nombre='$nombre', tipo='$tipo', sjr='$sjr', cuartilScopus='$cuartilScopus' WHERE id='".$row['id']."'";
            		if ($connection->query($query)=== TRUE) {
                } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                }
              }else{
                $query = "INSERT INTO Revista (rank, nombre, tipo, issn, sjr, cuartilScopus) VALUES ('$rank','$nombre','$tipo','$issn','$sjr','$cuartilScopus')";
            		if ($connection->query($query)=== TRUE) {
                  
                } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                }
              }
        }
        $query2= "SELECT issn FROM Revista";
        $result2= mysqli_query($connection, $query2);
        while ($row2= mysqli_fetch_assoc($result2)) {
            $issn2 = $row2['issn']; 
            for ($i = 2; $i <= $numRows; $i++) {
                $issn = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                if($issn2 === $issn){
                    break;
                }elseif($i >= $numRows){
                    $query = "UPDATE Revista SET cuartilScopus='' WHERE issn='".$issn2."'";
                	if ($connection->query($query)=== TRUE) {
                    } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                    }
                }
            }
        }
        
    }elseif($actualdb==="ISI"){
        for ($i = 2; $i <= $numRows; $i++) {
      		    $rank = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
          		$nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
          		$tipo = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
          		$issn = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
          		$sjr = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
          		$cuartilISI = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
          		
          		$query= "SELECT * FROM Revista WHERE issn = '$issn'";
              $result= mysqli_query($connection, $query);
               if ($row= mysqli_fetch_assoc($result)) {
                  $query = "UPDATE Revista SET rank='$rank', nombre='$nombre', tipo='$tipo', sjr='$sjr', cuartilIsci='$cuartilISI' WHERE id='".$row['id']."'";
              		if ($connection->query($query)=== TRUE) {
                  } else {
                  echo "Error: " . $query . "<br>" . $conn->error;
                  }
                }else{
                  $query = "INSERT INTO Revista (rank, nombre, tipo, issn, sjr, cuartilIsci) VALUES ('$rank','$nombre','$tipo','$issn','$sjr','$cuartilISI')";
              		if ($connection->query($query)=== TRUE) {
                    
                  } else {
                  echo "Error: " . $query . "<br>" . $conn->error;
                  }
                }
          }
        
        $query2= "SELECT issn FROM Revista";
        $result2= mysqli_query($connection, $query2);
        while ($row2= mysqli_fetch_assoc($result2)) {
            $issn2 = $row2['issn']; 
            for ($i = 2; $i <= $numRows; $i++) {
                $issn = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                if($issn2 === $issn){
                    break;
                }elseif($i >= $numRows){
                    $query = "UPDATE Revista SET cuartilIsci='' WHERE issn='".$issn2."'";
                	if ($connection->query($query)=== TRUE) {
                    } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                    }
                }
            }
        }
    }elseif($actualdb==="Colciencias"){
      for ($i = 2; $i <= $numRows; $i++) {
      		    $rank = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
          		$nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
          		$tipo = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
          		$issn = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
          		$sjr = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
          		$cuartilScopus = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
          		$cuartilISI = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
          		$cuartilColciencias = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
          		
          		$query= "SELECT * FROM Revista WHERE issn = '$issn'";
              $result= mysqli_query($connection, $query);
               if ($row= mysqli_fetch_assoc($result)) {
                    $query = "UPDATE Revista SET rank='$rank', nombre='$nombre', tipo='$tipo', sjr='$sjr', 
                    cuartilScopus='$cuartilScopus', cuartilIsci='$cuartilISI', cuartilIndex='$cuartilColciencias' WHERE id='".$row['id']."'";
              		if ($connection->query($query)=== TRUE) {
                  } else {
                  echo "Error: " . $query . "<br>" . $conn->error;
                  }
                }else{
                  $query = "INSERT INTO Revista (rank, nombre, tipo, issn, sjr, cuartilScopus, cuartilIsci, cuartilIndex) VALUES ('$rank','$nombre','$tipo','$issn','$sjr','$cuartilScopus','$cuartilISI','$cuartilColciencias')";
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
    }
    
    
	$connection->close();
	header('Location: Revistas.php');
?>