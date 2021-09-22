<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Result</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Class Details</span>
        <a href="logout.php" style="color: black; text-decoration:none;"><span class="fa fa-sign-out"></span><b> LOGOUT</b></a>
    </div>
    <hr style="height: 5px;width:100%;color:black;background-color:black">
    <div class="nav">
        <ul>
            <li>
                <a href="dashboard.php"><b>DASHBOARD</b></a>
            </li>

            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn"><b>CLASSES &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                <a href="manage_classes.php"><b>MANAGE CLASSES</b></a>
                    <a href="add_classes.php"><b>ADD CLASSES</b></a>
              
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn"><b>RESULTS &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                <a href="manage_results.php"><b>MANAGE RESULTS</b></a>
                    <a href="add_results.php"><b>ADD RESULTS</b></a>
                   
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn"><b>STUDENTS &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                <a href="manage_students.php"><b>MANAGE STUDENTS</b></a>
                    <a href="add_students.php"><b>ADD STUDENTS</b></a>
                  
                </div>
            </li>
          
        </ul>
    </div>
    <hr style="height: 5px;width:100%;color:black;background-color:black">
    <br><br><br>
    <div class="main" style="width:70%;margin-left:13%;font-weight:bold;">
        <?php
            include('init.php');
            include('session.php');
            $db = mysqli_select_db($conn, 'simplestresult');

            $sql = "SELECT `name`, `id` FROM `class`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                <caption><b>MANAGE CLASSES</b></caption>
                <tr>
                <th>Serial No.</th>
                <th>NAME</th>
                <th>Add/Delete</th>
                </tr>";

                $cnt=1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td><a href='delete-class.php?id=".$row['id']."' style='color:black; text-decoration:none;'><span class='fa fa-trash'></span> Delete</a></td>";
    
                    echo "</tr>";

                    $cnt++;
                }

                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        
    </div>

</body>
</html>

