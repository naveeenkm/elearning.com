<?php
include 'connect.php';?>
<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
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
    <title>Lectures Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="x">
    <div class="container">
        <div class="x2">Lectures</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">faculty_id</th>
                    <th scope="col">course_id</th>
                    
                    
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>


            <?php
            $sql="select * from lectures";
            $result=mysqli_query($con,$sql);
            if($result){
               while( $row=mysqli_fetch_array($result)){
                $facultyid=$row['faculty_id'];
                $courseid=$row['course_id'];
               echo ' <tr>
               <th scope="row">'.$facultyid.'</th>
               <td>'.$courseid.'</td>
               
              
               <td>
               <button class="btn btn-primary"><a href="uplectures.php?updateid[]='.$facultyid.'&id[]='.$id1.'&id[]='.$id2.' & updateid[]='.$courseid.' &id[]='.$id1.'&id[]='.$id2.' "
               class="text-light" >Update</a></button></td><td>
               <button class="btn btn-danger" ><a href="zlectures.php?deleteids[]='.$facultyid.'&id[]='.$id1.'&id[]='.$id2.'&deleteids[]='.$courseid.' &id[]='.$id1.'&id[]='.$id2.'"
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
" class="text-light">Entites</a></button>
        <button class="btn btn-primary "><a href="lectures.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>
" class="text-light">Insert</a></button>
    </div>
    </section>
    </div>
    </section>
</body>

</html>