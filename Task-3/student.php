<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php");

        if (!isset($_GET['class'])) {
            $class=null;
        } else {
            $class=$_GET['class'];
        }
        $rn=$_GET['rn'];

        if (empty($class) or empty($rn) or preg_match("/[a-z]/i", $rn)) {
            if (empty($class)) {
                echo '<p class="error">Please select your class</p>';
            }
            if (empty($rn)) {
                echo '<p class="error">Please enter your roll number</p>';
            }
            if (preg_match("/[a-z]/i", $rn)) {
                echo '<p class="error">Please enter valid roll number</p>';
            }
            exit();
        }

        $name_sql=mysqli_query($conn, "SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while ($row = mysqli_fetch_assoc($name_sql)) {
            $name = $row['name'];
        }

        $result_sql=mysqli_query($conn, "SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while ($row = mysqli_fetch_assoc($result_sql)) {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if (mysqli_num_rows($result_sql)==0) {
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <h1 style=" text-align:center;background-color: #d1cfe2;font-size:3rem;width:100%;">Result</h1>


        <div class="main2">
            <table>
                <thead>
                  <tr >
                    <td style="text-align:center;background-color:#008cba;"> S.No. </td>
                    <td colspan="10" style="text-align:center;background-color:#008cba;">Subjects </td>
                    <td rowspan="2" style="text-align:center;background-color:#008cba;">  Marks Obtained </td>
                  </tr>   
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align:center;background-color:white;"> 1 </td>
                    <td style="text-align:center;background-color:white;" colspan="10">Subject 1 </td>
                    <td style="text-align:center;background-color:white;"> <?php echo '<p>'.$p1.' / 100</p>';?> </td>
                  </tr>
                
                  <tr>
                    <td style="text-align:center;background-color:white;">  2 </td>
                    <td style="text-align:center;background-color:white;"colspan="10">Subject 2 </td>
                    <td style="text-align:center;background-color:white;"> <?php echo '<p>'.$p2.' / 100</p>';?></td>
                  </tr>
            
                  <tr>
                    <td style="text-align:center;background-color:white;"> 3 </td>
                    <td style="text-align:center;background-color:white;"colspan="10">Subject 3 </td>
                    <td style="text-align:center;background-color:white;"> <?php echo '<p>'.$p3.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td style="text-align:center;background-color:white;"> 4 </td>
                    <td style="text-align:center;background-color:white;" colspan="10">Subject 4 </td>
                    <td style="text-align:center;background-color:white;"> <?php echo '<p>'.$p4.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td style="text-align:center;background-color:white;"> 5 </td>
                    <td style="text-align:center;background-color:white;" colspan="10">Subject 5 </td>
                    <td style="text-align:center;background-color:white;"> <?php echo '<p>'.$p5.' / 100</p>';?> </td>
                  </tr>
                </tbody>
            
                
                <tfoot>
                    
                    <tr>
                    <td style="text-align:center;background-color:white;"></td>
                    <td style="text-align:center;background-color:white;"colspan="10" class="footer">Total Marks Obtained</td>
                    <td style="text-align:center;background-color:white;"colspan="2"> <?php echo $mark;?> / 500 </td>
                    </tr>
                    
                    <tr>
                    <td style="text-align:center;background-color:white;"colspan="10" class="footer">Percentage</td>
                    <td style="text-align:center;background-color:white;" colspan="2"><?php echo $percentage;?>% </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;background-color:white;" colspan="10" class="footer">Student's Name</td>
                        <td style="text-align:center;background-color:white;" colspan="2"><?php echo $name;?> </td>
                        </tr>

                    <tr>
                        <td style="text-align:center;background-color:white;" colspan="10" class="footer">Class</td>
                        <td style="text-align:center;background-color:white;" colspan="2"><?php echo $class;?> </td>
                        </tr>
                
                        <tr>
                        <td style="text-align:center;background-color:white;" colspan="10" class="footer">Roll</td>
                        <td  style="text-align:center;background-color:white;" colspan="2"><?php echo $rn;?> </td>
                        </tr>
                </tfoot>
              </table>

              <div class="row">
                  <div class="container">
                  <div   class="button">
                    <button class="button" onclick="window.print()">Print Result</button>
        </div>
                  </div>
              </div>
        </div>
    </div>
</body>
</html>

<style>
  
  td {
    border: 1px solid #726E6D;
    padding: 7px;
  }
  
  thead{
    font-weight:bold;
    text-align:center;
    background: #625D5D;
    color:white;
  }

  .button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 3px 6px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
  
  table {
    border-collapse: collapse;
  }
  
  .footer {
    text-align:right;
    font-weight:bold;
  }
  
  tbody >tr:nth-child(odd) {
    background: #D1D0CE;
  }
  
  </style>