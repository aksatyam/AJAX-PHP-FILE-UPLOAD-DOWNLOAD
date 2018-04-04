<?php
     $host   = 'localhost';
     $user   = 'root';
     $pass   = '';
     $db     = 'demodb'; 
 
     $conn=mysqli_connect($host,$user,$pass,$db);
     if($conn){
        $query="SELECT * FROM user_master";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td><a href=". $row['profilepic'] .">". $row['profilepic']."</a></td>";
                echo "<td>" . $row['isActive'] . "</td>";
                echo "</tr>";
            }
            //echo json_encode($row);
        } else {
            echo "<h2>No Records Found</h2>";
        }
        
        mysqli_close($conn);
     }
?>