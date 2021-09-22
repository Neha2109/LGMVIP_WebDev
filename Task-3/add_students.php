<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Result</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Student Details</span>
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
        <form action="" method="post">
            <fieldset>
                <legend><b>ADD STUDENT</b></legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Registration Number">
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn, "SELECT `name` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while ($row = mysqli_fetch_array($class_result)) {
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="SUBMIT DETAILS">
            </fieldset>
        </form>
    </div>

    <div class="footer">
    </div>
</body>
</html>

<?php

    if (isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if (!isset($_POST['class_name'])) {
            $class_name=null;
        } else {
            $class_name=$_POST['class_name'];
        }

        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i", $rno) or !preg_match("/^[a-zA-Z ]*$/", $name)) {
            if (empty($name)) {
                echo '<p class="error">Please enter name</p>';
            }
            if (empty($class_name)) {
                echo '<p class="error">Please select your class</p>';
            }
            if (empty($rno)) {
                echo '<p class="error">Please enter your roll number</p>';
            }
            if (preg_match("/[a-z]/i", $rno)) {
                echo '<p class="error">Please enter valid roll number</p>';
            }
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                echo '<p class="error">No numbers or symbols allowed in name</p>';
            }
            exit();
        }
        
        $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($conn, $sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Success!!")';
            echo '</script>';
        }
    }
?>