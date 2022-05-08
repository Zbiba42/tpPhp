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
        // if(!isset($_POST['modif'])){
        //     header('location: index.php');
        // }
        require_once 'nav.php';
        include_once 'database.php';
        $idd=$_POST['id'];
        $sqlState = $pdo->prepare('SELECT * FROM person WHERE id=?');
        $sqlState->execute([$idd]);
        $khona = $sqlState->fetch(PDO::FETCH_OBJ); 
            
        if(isset($_POST['save'])){
            $newname=$_POST['newname'];
            $newprenom=$_POST['newprenom'];
            $newage=$_POST['newage'];
            $id=$_POST['id'];
            if(!empty($id) && !empty($newname) && !empty($newprenom) && !empty($newage)){
                $sqlState=$pdo->prepare('UPDATE person SET Nom=?,Prenom=?,Age=? WHERE id=?');
                $end=$sqlState->execute([$newname,$newprenom,$newage,$id]);
                if($end == true){
                    header('location:index.php');
                }else{
                    echo 'error';
                }
            }
            
        }
    
    ?>
    <form action="modifier.php" method="post">
    <input type="hidden" name="id" value="<?php echo $khona->id?>">
        <label for="newname">NEW name: </label><br>
        <input type="text" name="newname" id=""><br>
        <label for="newprenom">new prenom: </label><br>
        <input type="text" name="newprenom" id=""><br>
        <label for="newage">new age: </label><br>
        <input type="number" name="newage" id=""><br>
        <input type="submit" name='save' value="save">
    </form>
    
</body>
</html>