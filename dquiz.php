<?php
include 'connect.php';?>
<?php 
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
    <title>Quiz Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="x">
    <div class="container">
        <div class="x2">Quiz</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">quiz_id</th>
                    <th scope="col">quiz_grade</th>
                    <th scope="col">quiz_date</th>
                    <th scope="col">quiz_type</th>
                    <th scope="col">course_id</th>
                    
                    
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>


            <?php
            $sql="select * from quiz";
            $result=mysqli_query($con,$sql);
            if($result){
               while( $row=mysqli_fetch_array($result)){
                $quizid=$row['quiz_id'];
                $quizgrade=$row['quiz_grade'];
                $quizdate=$row['quiz_date'];
                $quiztype=$row['quiz_type'];
                $courseid=$row['course_id'];
               echo ' <tr>
               <th scope="row">'.$quizid.'</th>
               <td>'.$quizgrade.'</td>
               <td>'.$quizdate.'</td>
               <td>'.$quiztype.'</td>
               <td>'.$courseid.'</td>
               
              
               <td>
               <button class="btn btn-primary"><a href="upquiz.php?updateid='.$quizid.'&id[]='.$id1.'&id[]='.$id2.'"
               class="text-light" >Update</a></button></td><td>
               <button class="btn btn-danger" ><a href="zquiz.php?deleteid='.$quizid.'&id[]='.$id1.'&id[]='.$id2.'"
               class="text-light " >Delete</a></button></td>
              
           </tr>';

               }
            }
            
            





             ?>

            </tbody>
        </table>
    </div>
    <section>
    <div class="N">
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>
" class="text-light">Done</a></button>
        <button class="btn btn-primary "><a href="quiz.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>
" class="text-light">Add a Quiz</a></button>
    </div>
    </section>
    </div>
    </section>
        
</body>

</html>