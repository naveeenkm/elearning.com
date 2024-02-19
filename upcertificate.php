<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>


<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="select * from certificate where certificate_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$cid=$row['certificate_id'];
$cname=$row['certificate_name'];
$cerisssdate=$row['certificate_issdate'];
$cerlevel=$row['certificate_level'];

if(isset($_POST['submit'])){
    $cid=$_POST['cid'];
    $cname=$_POST['cname'];
    $cerisssdate=$_POST['certissdate'];
    $cerlevel=$_POST['certlevel'];
  $sql="update certificate set certificate_id=$cid,certificate_name='$cname',certificate_issdate='$cerisssdate',certificate_level='$cerlevel'  where certificate_id=$id ";
  if($cid){
  $result=mysqli_query($con,$sql);
  }else{
    echo 'enter the correct values';
  }
  if($result){
    // echo 'updated successfully';
    header("location:dcertificate.php?id[]={$id1}&id[]={$id2}");
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
  <title>Certificate</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
  </style>
</head>

<body>
<section>
  <div class="container">
    <h1 >Enter the details</h1><br><br>
    <form method="post">
      <div class="form-group">
        <label>Certificate id</label><br>
        <input type="number" class="form-control" placeholder="Enter Certificate id" name="cid" value=<?php echo $cid;?>>
      </div><br>
      <div class="form-group">
        <label>Certificate name</label><br>
        <input type="text" class="form-control"   placeholder="Enter Certificate name" name="cname" value=<?php echo $cname;?>>
      </div><br>
      <div class="form-group">
        <label>Certificate issuedate</label><br>
        <input type="date" class="form-control" placeholder="Enter Certificate issuedate" name="certissdate" value=<?php echo $cerisssdate;?>>
      </div><br>
      <div class="form-group">
        <label>Certificate level</label><br>
        <input type="text" class="form-control" placeholder="Enter Certificate level" name="certlevel" value=<?php echo $cerlevel;?> >
      </div><br>
      
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br>
    <button class="btn btn-primary "><a href="dcertificate.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Back</a></button>
      
  </div>
</section>
</body>

</html>