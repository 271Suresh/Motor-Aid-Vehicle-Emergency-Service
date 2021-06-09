<?php
session_start();
include ("connection.php");

if(isset($_SESSION['login_user'])){
	echo "<h3>Welcome <br>" . $_SESSION['login_user']."</h3>";
}
else
{
	echo "<script>alert('please enter username and password!')</script>";
	echo "<script>location.href='index.php'</script>";
}
?>
<html>
    <head>
    <style>
            table {
            border-collapse: collapse;
            width: 100%;
            }

            th, td {
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
            background-color: #4CAF50;
            color: white;
            }
            h1 { 
                        font-weight: bold;
                        color:#149e1c;
                        text-align: center;
                        font-family:  sans-serif;
                    }
            a:link, a:visited {
            background-color: #5995d0;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }

            a:hover, a:active {
            background-color: red;
            }
</style>
</head>
<body>

    <h1>Job done description</h1>
    <table class="table">
                      <thead class=" text-primary">
                        <th>
                           
                      </th>
                        <th>
                          ID
                        </th>
                        <th>
                          Job Done Description
                        </th>
                        <th>
                          Service Charges
                        </th>
                        <th>
                          Travel Expenses
                        </th>
            
                        <th>
                          Service Request ID 
                        </th>
                        <th>
                           Service Provider
                        </th>
                        <th>
                           
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        include ("connection.php");

                        $sp_id = $_GET['sp'];

                        $sql = "SELECT * from service_process";
                        $result = $conn->query($sql);

                        $sql2 = "SELECT * from service_provider where sp_id='$sp_id'";
                        $result2 = $conn->query($sql2);

                        if($result->num_rows > 0 && $result2->num_rows > 0){
                          while($row = $result->fetch_assoc()){
                            echo "<tr><td><a href='feedback.php?spc=$row[sr_proc_id]'>Provide Feedback</td><td>". $row["sr_proc_id"]."</td><td>". $row["job_done_des"]."</td><td>". $row["service_charges"].
                            "</td><td>". $row["travel_exp"]."</td><td>". $row["sr_id"].
                            "</td>";
                            

                          }
                          while($row2 = $result2->fetch_assoc()){
                            echo "<td>". $row2["sp_name"]."</td></tr>";
                          }
                          echo "</table>";
                        }
                        else{
                          echo "0 result";
                        }
                        $conn->close();
                        ?>
                        </table>
                        
                      </tbody>
                    </table>
                    </body>
                    </html>