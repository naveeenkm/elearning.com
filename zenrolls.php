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
    $sql="delete from enrolls where student_id=$id11 and course_id=$id21";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted Sucessfully";
        header("location:denrolls.php?id[]={$id1}&id[]={$id2}");
    }
    else{
        die(mysqli_error($con));
    }
}
?>