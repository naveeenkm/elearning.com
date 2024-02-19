<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php
include 'connect.php';

$id11=$_GET['updateid'][0];
$id21=$_GET['updateid'][1];
$sql="select * from student_student_phno where student_phno=$id11 and student_id=$id21";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$stupno=$row['student_phno'];
$sid=$row['student_id'];


if(isset($_POST['submit'])){
  $stupno=$_POST['studentphno'];
  $sid=$_POST['studentid'];
  
  $sql="update Student_student_phno set student_phno=$stupno,student_id='$sid' where student_phno=$id11 and student_id=$id21 ";
  if($stupno){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:dstphone.php?id[]={$id1}&id[]={$id2}");
  }
else{
  die(mysqli_error($con));
}
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student phone number</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
 
</head>

<body>
<section>
  <div class="container">
    <h1 >Enter the details</h1><br><br>
    <form method="post">
      <div class="form-group">
        <label>Student phone number</label><br>
        <input type="number" class="form-control" placeholder="Enter Student phone number" name="studentphno" value=<?php echo $stupno;?>>
      </div><br>
      <div class="form-group">
        <label>Student id</label><br>
        <input type="number" class="form-control" placeholder="Enter Student id" name="studentid" value=<?php echo  $sid;?>>
      </div><br>
       
      
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br>
    
      <button  class="btn btn-primary" ><a href="dstphone.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Back </a></button>
  </div>
</section>
</body>

</html>