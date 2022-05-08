<?php 
if(isset($_POST['Suprimer'])){
    require_once 'database.php';
    $dakLiAytmss7=$_POST['id'];
    $sqlState =$pdo->prepare('DELETE FROM person WHERE id=?');
    $sqlState->execute([$dakLiAytmss7]);
    header('Location: index.php');
}

?>