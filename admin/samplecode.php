
<html>
    <body>

    <table border ="1">
        
        <th>
            User first name
        </th>
        <th>
            User Last name
        </th>
        <th>
           User Date Of birth
        </th>
        <th>
           User form
        </th>
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname="tutor_db";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT user_first_name, user_last_name, user_dob, user_form from users" ;
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            echo "<tr><td>". $row["user_first_name"]."</td><td>". $row["user_last_name"]."</td><td>". $row["user_dob"]."</td><td>". $row["user_form"]."</td></tr>";
            

            }
            echo "</table>";
        }
        else{
            echo "0 result";
        }
        $conn->close();
        ?>
        </table>
        
    </body>    
</html>