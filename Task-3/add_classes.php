<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
                <a href="manage_classes.php">MANAGE CLASS</a>
                    <a href="add_classes.php">ADD CLASS</a>
               
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn"><b>RESULTS &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                <a href="manage_results.php">MANAGE RESULTS</a>
                    <a href="add_results.php">ADD RESULTS</a>
                 
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn"><b>STUDENTS &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                <a href="manage_students.php">MANAGE STUDENTS</a>
                    <a href="add_students.php">ADD STUDENTS</a>
                   
                </div>
            </li>
           
        </ul>
    </div>
    <hr style="height: 5px;width:100%;color:black;background-color:black">
    <br><br><br><br>
    <div class="main"style="width:70%;margin-left:13%;font-weight:bold;">
        <br><br><br>
        <form action="" method="post">
            <fieldset>
                <legend><b>ADD CLASS</b></legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
                <input type="submit" value="SUBMIT">
            </fieldset>        
        </form>
        <br><br><br>
    </div>

    <div class="footer">

    </div>
</body>
</html>

<?php
    include('init.php');
    include('session.php');

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

       
        if (empty($name) or empty($id) or preg_match("/[a-z]/i", $id)) {
            if (empty($name)) {
                echo '<p class="error">OOPS !! Please enter class</p>';
            }
            if (empty($id)) {
                echo '<p class="error">OOPS !! Please enter class id</p>';
            }
            if (preg_match("/[a-z]/i", $id)) {
                echo '<p class="error">OOPs !! Please enter valid class id</p>';
            }
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn, $sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Class Successfully Added......!!")';
            echo '</script>';
        }
    }

?>