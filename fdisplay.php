<?php
include 'connect.php';?>
<?php 
$id1=$id2='login first';
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <style>
         .x
        {
            background-color: transparent;
            border-radius: 20px;
    backdrop-filter: blur(500px);
            position: absolute;
            top: 282px; 
            left: 30%;
            
            color: black;
            padding: 2%;
            top: 10%; 
            left: 200px;
            right: 403px;
            
        }
        .x button{
            width: 100%;
    height: 34px;
    border-radius: 40px;
    background-color: rgb(98, 81, 238,1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
        }
        .q1
        {
            margin-top: -655px;
    margin-right: -1290px;
            width: 13%;
    height: 52px;
    border-radius: 40px;
    background-color: #6c5bfd;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
        }
        button:hover {
  background-color: rgb(255, 255,255, 0.5);
} 
        
    </style>

</head>

<body>
    
<div class="x">


<form action="fdisplay.php" method="GET">
   
<input type="hidden" name="id[]" value="<?php echo $id1; ?>">
    <input type="hidden" name="id[]" value="<?php echo $id2; ?>">
    <h5>Enter your faculty id:</h5>
    <input type="number" name="courseid" placeholder="Enter the faculty id here :"><br><br>
    <button type="submit">Submit</button><br><br>
</form>
<?php
            if (isset($_GET['courseid'])) {
                
                
                $courseid = $_GET['courseid'];
            $sql="SELECT f.faculty_id, f.faculty_name, f.faculty_age, f.faculty_exp,c.course_id
            FROM faculty f
            LEFT JOIN Lectures l ON f.faculty_id = l.faculty_id
            LEFT JOIN Courses c ON l.course_id = c.course_id
            where f.faculty_id=$courseid 
            GROUP BY f.faculty_id , c.course_id";
            $result=mysqli_query($con,$sql);



            
            if($result){
                $row=mysqli_fetch_array($result);
                

                $id = is_array($row) && !empty(array_filter($row)) ? 1 : 0;


                if($id)
                {
                echo '<table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">faculty_id</th>
            <th scope="col">faculty_name</th>
            <th scope="col">faculty_age</th>
            <th scope="col">faculty_exp</th>
            <th scope="col">Courses id you are teaching</th>
            
            </tr>
        </thead>
        <tbody>';
          
        $courseid = $_GET['courseid'];
        $sql="SELECT f.faculty_id, f.faculty_name, f.faculty_age, f.faculty_exp,c.course_id
        FROM faculty f
        LEFT JOIN Lectures l ON f.faculty_id = l.faculty_id
        LEFT JOIN Courses c ON l.course_id = c.course_id
        where f.faculty_id=$courseid 
        GROUP BY f.faculty_id , c.course_id ";
        $result=mysqli_query($con,$sql);

               while( $row=mysqli_fetch_array($result)){
                $fid = $row["faculty_id"];
                $fname = $row["faculty_name"];
                $fage = $row["faculty_age"];
                $fexp = $row["faculty_exp"];
                $coursesTaught = $row["course_id"];

                echo '<tr>
                        <th scope="row">' . $fid . '</th>
                        <td>' . $fname . '</td>
                        <td>' . $fage . '</td>
                        <td>' . $fexp . '</td>
                        <td>' . $coursesTaught . '</td>
                       
              
               
           </tr>';

               }
            
           
        }
        else{
            echo $courseid. ' faculty  id not exisits...<br>';
            echo 'enter onther one';
        }
    }
        }
            
            





             ?>

            </tbody>
            
        </table>

</div>
   
<?php
            if (isset($_GET['courseid'])) {
                echo '<button class="q1" onclick="window.location.href=\'entity.php?id[]=' . $id1 . '&id[]=' . $id2 . '\'">Logout</button>';


            }
            else
            {
                echo '<button class="q1" onclick="window.location.href=\'entity.php?id[]=' . $id1 . '&id[]=' . $id2 . '\'">Cancel</button>'; 
            }
            
            
            ?>
</body>

</html>