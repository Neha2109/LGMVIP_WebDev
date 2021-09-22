<?php
    include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `result`"));
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="normalize.css">
    <title>Result</title>
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: black; text-decoration:none;padding-top:30px;"><span class="fa fa-sign-out"></span><b> LOGOUT</b></a>
    </div>
    <hr style="height: 5px;width:100%;color:black;background-color:black">
    <div class="nav">
        <ul>
            
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
    <div class="main">
        <?php
            echo '<p>TOTAL CLASSES               :  '.$no_of_classes[0].'</p>';
            echo '<p>TOTAL STUDENTS              :  '.$no_of_students[0].'</p>';
            echo '<p> TOTAL RESULTS PUBLISHED    :  '.$no_of_result[0].'</p>';
        ?>
    </div>

    
</body>
</html>

<?php
   include('session.php');
?>