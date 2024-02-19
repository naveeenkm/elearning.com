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
    <title>Page with Header and Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(img.jpg);
        }

        header {
            background-color: #1a444b;
            backdrop-filter: blur(150px);
            color: white;
            padding: 54px;
            text-align: center;
        }

        

        button{
            width: 10%;
            height:50px;
        }
        .icon{
          position: absolute;
            top: 34px; 
            right: 5px;
        }
        .x1
        {
            background-color: transparent;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
    backdrop-filter: blur(120px);
            position: absolute;
            top: 235px; 
            left: 0px;
            
            color: black;
            padding: 9px;
            height: 900px;
            width:290px;
        }
        .x1 button{
            width: 100%;
    height: 129px;
    border-radius: 10px;
    background-color:rgb(25, 0, 226,1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s linear(-0.39 -30.59%, 1.26 108.82%);
    
        }
       .x2
        {
            background-color: transparent;
            border-radius: 20px;
    backdrop-filter: blur(300px);
            position: absolute;
            top: 282px; 
            right: 25px;
            
            color: black;
            padding: 2%;
            height: 175px; 
            width:700px;
        
        }
        .x2 button{
            width: 25%;
    height: 40px;
    border-radius: 10px;
    background-color: rgb(25, 0, 226,1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
        }
        .x3
        {
            background-color: transparent;
            border-radius: 20px;
    backdrop-filter: blur(120px);
            position: absolute;
            top: 500px; 
            left: 25px;
            
            color: black;
            padding: 2%;
            height: 175px;
            width:700px;
        }
        .x3 button{
            width: 25%;
    height: 40px;
    border-radius: 10px;
    background-color: rgb(25, 0, 226,1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
        }
        .x4
        {
            background-color: transparent;
            border-radius: 20px;
    backdrop-filter: blur(120px);
            position: absolute;
            top: 500px; 
            right: 25px;
            
            color: black;
            padding: 2%;
            height: 175px;
            width:700px;
        }
        .x4 button{
            width: 25%;
    height: 40px;
    border-radius: 10px;
    background-color: rgb(25, 0, 226,1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
        }
        section{
            min-height: 100vh;
            background-image: url(img3.webp);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
        }
        h1{
            color: white;
        }
        .a{
            text-decoration: none;
            color: white;
        }
        button {
    width: 10%;
    height: 52px;
    border-radius: 40px;
    background-color: rgb(255, 255,255, 1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
}

button:hover {
  background-color: rgb(255, 255,255, 0.5);
} a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<header>
    <h1>Queries</h1><br>
    <div class="icon"><ion-icon name="person" style="font-size: 5em;"></ion-icon><br>


    <?php 
    if (isset($_GET['id']) && is_array($_GET['id'])) {
        $id1 = $_GET['id'][0];
        $id2 = $_GET['id'][1];
        echo "Username: <strong>$id1</strong><br>";
        echo "Email id: <strong>$id2</strong><br>";
    } else {
        echo '<button style="width: 100px;" onclick="window.location.href=\'login.php\'">Login Here</button>'; 
    }
?></div>
    <button class="abc"><a href="content.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Home</a></button>
    <button><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Your Details</a></button>
    <button>Search</button>
    <button><a href="triggers.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" ><a href="triggers.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >History</a></a></button>
    <button>Assertions</button>
    <button><a href="about.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >About</a></button>
    <button><a href="login.php" >Sign Out</a></button>
</header>



<section>
<div class="x1">
    
   <button ><a class="a" href="q1.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>">Faculty</a></button></h4><br><br>
    <button ><a class="a" href="q2.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>">Assignments</a></button></h4><br><br>
    <button ><a class="a" href="q3.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>">Students</a></button></h4><br><br>
    <button ><a class="a" href="q4.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>">Quizez</a></button></h4>
    
</div>
<!-- <div class="x2">
    <h4>Assignments </h4><br>
    
    
</div>
<div class="x3">
    <h4> Students </h4><br>
    <h4>click here to search <button>click here</button></h4>
    
</div>
<div class="x4">
    <h4>Quiz</h4><br>
    <h4>click here to search <button>click here</button></h4>
    
</div>

     -->

</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>
