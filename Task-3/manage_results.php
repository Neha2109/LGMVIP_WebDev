<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/form.css">
    <title>Result</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Result Details</span>
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
    <div class="main" style="width:70%;margin-left:13%;font-weight:bold;">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>DELETE RESULT</legend>
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
                <input type="text" name="rno" placeholder="Registration No.">
                <input type="submit" value="Delete Result">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>UPDATE RESULT</legend>
                
                <?php
                    $class_result=mysqli_query($conn, "SELECT `name` FROM `class`");
                        echo '<select name="class">';
                        echo '<option selected disabled>Select Class</option>';
                    while ($row = mysqli_fetch_array($class_result)) {
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                <input type="text" name="rn" placeholder="Registration Number">
                <input type="text" name="p1" id="" placeholder="Subject 1 - Marks">
                <input type="text" name="p2" id="" placeholder="Subject 2 - Marks">
                <input type="text" name="p3" id="" placeholder="Subject 3 - Marks">
                <input type="text" name="p4" id="" placeholder="Subject 4 - Marks">
                <input type="text" name="p5" id="" placeholder="Subject 5 - Marks">
                <input type="submit" value="Update Result">
            </fieldset>
        </form>
    </div>

 
    
</body>
</html>

<?php
    if (isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn, "DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if (!$delete_sql) {
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if (isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn, $sql);

        if (!$update_sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>