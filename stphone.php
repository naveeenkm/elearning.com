<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $studentphno=$_POST['studentphno'];
  $studentid=$_POST['studentid'];
  
  
  $sql="insert into student_student_phno(student_phno,student_id)
  values('$studentphno','$studentid')";
  $result=mysqli_query($con,$sql);
  if($result){
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
        <input type="number" class="form-control" placeholder="Enter Student phone number" name="studentphno">
      </div><br>
      <div class="form-group">
        <label>Student id</label><br>
        <input type="number" class="form-control" placeholder="Enter Student id" name="studentid">
      </div><br>
       
      
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br>
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Entites</a></button>
      <button  class="btn btn-primary" ><a href="dstphone.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Phone Display </a></button>
  </div>
</section>
</body>

</html>