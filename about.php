
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
        .icon{
          position: absolute;
            top: 34px; 
            right: 5px;
        }
        

        a{
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
        button{
            width: 10%;
            height:50px;
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
}
    </style>
</head>
<body>

<header>
    <h1>About Project</h1><br>
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
    
    <button><a href="content.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Home</a></button>
    <button><a href="entity.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Your Details</a></button>
    <button><a href="queries.php?id[]=<?php echo $id1; ?>&id[]=<?php echo $id2; ?>" >Search</a></button>
    <button>History</button>
    <button>Assertions</button>
    <button>About</button>
    <button><a href="login.php" >Sign Out</a></button>
</header>


<section>
   <div>hello</div>
    
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>
