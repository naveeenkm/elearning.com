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
    $sql="delete from student where student_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       
    }
    else{
        die(mysqli_error($con));
    }
}
?>
<html>
    <head>
   <style>
    h2{
        color: red;
        text-align: center;
    }
    div
    {
        align-items: center;
        background-color: transparent;
            border-radius: 20px;
            
    backdrop-filter: blur(800px);
            position: absolute;
            top: 54px; 
            left: 532px;
            
            color: black;
            padding: 9px;
            height: 199px;
            width:450px;
    }
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(img3.webp);
            background-repeat: no-repeat;
            background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
        }
    button{
        width: 80%;
    height: 52px;
    border-radius: 40px;
    background-color: rgb(255, 255,255, 1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
    margin-left: 8%;
    }
   </style>
    </head>
    <body>
       <div>
       <h2>Your  Details Updated Sucessfully....</h2><br><br>
       <button onclick="window.location.href = 'fdisplay1.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>'
">OK</button>
       </div> 
    

    </body>
</html>