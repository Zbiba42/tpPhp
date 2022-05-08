<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleall.css">
</head>
<body>
<?php
    require_once 'database.php';
    include_once 'nav.php';
    
  ?>
    <div class="cont">

        <?php 
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $prenom=$_POST['prenom'];
            $age=$_POST['age'];
            if(!empty($prenom) && !empty($name) && !empty($age)){
                $sqlState = $pdo->prepare('INSERT INTO person VALUES(null,?,?,?)');
                $sqlState->execute([$name,$prenom,$age]);
                
            }else{
                ?>
               
                   <h1> Required fields.</h1>
                
                <?php
            }

        }
        ?>
    </div>
    <form method="POST">
        <label for="name">Nom</label> <br>
        <input type="text" name="name" id=""><br>
        <label for="prenom">Prenom</label><br>
        <input type="text" name="prenom" id=""><br>
        <label for="age">Age</label>
        <input type="number" name="age" id="">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>