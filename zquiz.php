<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from quiz where quiz_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "Deleted Sucessfully";
        header("location:dquiz.php?id[]={$id1}&id[]={$id2}");
    }
    else{
        die(mysqli_error($con));
    }
}
?>