<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleall.css">
</head>
<body>
  <?php
    require_once 'database.php';
    include_once 'nav.php';
    $sqlState=$pdo->query('SELECT * FROM person');
    $bnadem=$sqlState->fetchAll(PDO::FETCH_OBJ);
  ?>
  <div class="container">
  <h3>Users</h3>
  <table>
    <tr>
    <th>Id</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>age</th>
    <th>opérations</th>
    </tr>
    

    <?php 
      foreach($bnadem as $bnademm){ ?>
         <tr>
                        <td><?= $bnademm->id ?> </td>
                        <td><?= $bnademm->Nom ?> </td>
                        <td><?= $bnademm->Prenom ?> </td>
                        <td><?= $bnademm->Age ?> </td>
                        <td><form action="suprimer.php" method="POST">
                          <input type="hidden" name="id" value="<?= $bnademm->id ?>">
                          <input type="submit" value="Suprimer" name="Suprimer">
                        </form>
                        <form action="modifier.php" method="post">
                        <input type="hidden" name="id" value="<?= $bnademm->id ?>">
                        <input type="submit" value="modifier" name='modif'>
                        </form>
                      </td>
                        <?php 
      }
    ?>


  </table>
  </div>
</body>
</html>