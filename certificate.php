<?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
    }
    ?>
<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $certificateid=$_POST['cid'];
  $certificatename=$_POST['cname'];
  $certificateissdate=$_POST['certissdate'];
  $certificatelevel=$_POST['certlevel'];
 
  $sql="insert into certificate(certificate_id,certificate_name,certificate_issdate,certificate_level)
  values('$certificateid','$certificatename','$certificateissdate','$certificatelevel')";
  $result=mysqli_query($con,$sql);
  if($result){
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
        <input type="number" class="form-control" placeholder="Enter Certificate id" name="cid">
      </div><br>
      <div class="form-group">
        <label>Certificate name</label><br>
        <input type="text" class="form-control"   placeholder="Enter Certificate name" name="cname">
      </div><br>
      <div class="form-group">
        <label>Certificate issuedate</label><br>
        <input type="date" class="form-control" placeholder="Enter Certificate issuedate" name="certissdate">
      </div><br>
      <div class="form-group">
        <label>Certificate level</label><br>
        <input type="text" class="form-control" placeholder="Enter Certificate level" name="certlevel">
      </div><br>
      
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <br>
    <button class="btn btn-primary "><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Entites</a></button>
      <button  class="btn btn-primary" ><a href="dcertificate.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" class="text-light">Certificate Display </a></button>
  </div>
</section>
</body>

</html>