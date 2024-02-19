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
    <title>Certificate Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">

    
</head>

<body>
    <div class="x">
    <div class="container">
        <div class="x2">Certificate</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">certificate_id</th>
                    <th scope="col">certificate_name</th>
                    <th scope="col">certificate_issdate</th>
                    <th scope="col">certificate_level</th>
                    
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>


            <?php
            $sql="select * from certificate";
            $result=mysqli_query($con,$sql);
            if($result){
               while( $row=mysqli_fetch_array($result)){
                $certificateid=$row['certificate_id'];
                $certificatename=$row['certificate_name'];
                $certificateissdate=$row['certificate_issdate'];
                $certificatelevel=$row['certificate_level'];
               echo ' <tr>
               <th scope="row">'.$certificateid.'</th>
               <td>'.$certificatename.'</td>
               <td>'.$certificateissdate.'</td>
               <td>'.$certificatelevel.'</td>
              
               <td>
               <button class="btn btn-primary"><a href="upcertificate.php?updateid='.$certificateid.'&id[]='.$id1.'&id[]='.$id2.'"
               class="text-light" >Update</a></button></td><td>
               <button class="btn btn-danger" ><a href="zcertificate.php?deleteid='.$certificateid.'&id[]='.$id1.'&id[]='.$id2.'"
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

        <button class="btn btn-primary "><a href="certificate.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>
" class="text-light">Add a Certificate</a></button>
    </div>
    </section>
    </div>
    </section>
</body>

</html>