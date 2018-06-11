<?php
            $host= "127.0.0.1";
            $user= "azarot";
            $pass= "";
            $db= "mydb";
            $port= 3306;
            
            $connection= mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
            $query= "SELECT * FROM test";
            $result= mysqli_query($connection, $query);
            
            echo "<tr>";
              while ($row= mysqli_fetch_assoc($result)) {
                echo "<th>The ID is: " . $row['id'] . "</th> <th>and the Username is: " . $row['name']."</th>";
              }
            echo "</tr>";
?>
