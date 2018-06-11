<html>
    <?php
            $host= "127.0.0.1";
            $user= "azarot";
            $pass= "";
            $db= "mydb";
            $port= 3306;
            
            $id= $_POST['nameInputGroup'];
            $nombre= $_POST['cityInputGroup'];
            
            $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
            $query= "INSERT INTO test (id, name) VALUES ('$id' , '$nombre')";
            //$result= mysqli_query($connection, $query);
                
            if ($connection->query($query)=== TRUE) {
                echo "New record created successfully";
                header('Location: test.php');
            } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            }
            $connection->close();
          ?>
</html>