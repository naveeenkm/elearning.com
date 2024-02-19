<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php 
include 'connect.php'; 
if(isset($_GET['deleteids']) && is_array($_GET['deleteids'])){ 
    $id11=  $_GET['deleteids'][0];
    $id21= $_GET['deleteids'][1];
    $sql="delete from student_student_phno where  
    student_id=$id21 and student_phno=$id11"; 
    $result=mysqli_query($con,$sql); 
    if($result){ 
        // echo "Deleted Sucessfully"; 
        header("location:dstphone.php?id[]={$id1}&id[]={$id2}"); 
    } 
    else{ 
        die(mysqli_error($con)); 
    } 
} 
?>





















<!-- student_id=$id1 and student_phno=$id1 -->