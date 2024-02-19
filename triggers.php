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
            border-radius: 20px;
    backdrop-filter: blur(120px);
            position: absolute;
            top: 282px; 
            left: 30%;
            
            color: black;
            padding: 2%;
            
        }
        .x1 button{
            width: 32%;
    height: 40px;
    border-radius: 40px;
    background-color: rgb(98, 81, 238,1);
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.4s ease;
        }
        .x2
        {
            background-color: transparent;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
    backdrop-filter: blur(120px);
            position: absolute;
            top: 260px; 
            left: 0px;
            
            color: black;
            padding: 9px;
            height: 900px;
            width:290px;
        }
        .x2 button{
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
        .a{
            text-decoration: none;
            color: black;
        }
       
        section{
            min-height: 100vh;
            background-image: url(img3.webp);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
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
    <h1>History</h1><br>
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
<button ><a class="a" href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Your Details</a></button>
    <button ><a class="a" href="queries.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Search</a></button>
    <button class="a" >History</button>
    <button class="a" >Assertions</button>
    <button  ><a class="a" href="about.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >About</a></button>
    <button  ><a class="a"  href="login.php" >Sign Out</a></button>
</header>



<section>
<div class="x2">
    
    <button ><a class="a" href="t1.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>">Faculty History</a></button></h4><br><br>
     
     <button ><a class="a" href="t2.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>">Students History</a></button></h4><br><br>
    
    
 </div>
 
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>
