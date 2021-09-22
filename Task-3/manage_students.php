<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Result</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Student Details</span>
        <a href="logout.php" style="color: black; text-decoration:none;"><span class="fa fa-sign-out"></span> <b>LOG OUT</b></a>
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
    <div class="main" style="width:75%;margin-left:8%;font-weight:bold;">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                <caption><b>MANAGE RESULTS</b></caption>
                <tr>
                <th>Serial No.</th>
                <th>NAME</th>
                <th>ROLL</th>
                <th>CLASS</th>
                <th>DELETE</th>
                </tr>";
                $cnt=1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo"<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "<td><a href='delete-student.php?rno=".$row['rno']."' style='color:black; text-decoration:none;'><span class='fa fa-trash'></span> <b>DELETE</b></a></td>";
                    echo "</tr>";
                    $cnt++;
                }

                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>

  
</body>
</html>
