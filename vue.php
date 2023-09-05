<?php
    require_once 'connecte.php';
        $readSql = "SELECT * FROM `livres` ";

        $res = mysqli_query($con, $readSql);

        session_start();

        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Bibliothèque</title>
</head>
<body>
  <?php
       include 'navbar.php';
  ?> <br> <br>
        <div class="container">
                <div class="row pt-4">
                    <a href="connection.php">
                        <button class="btn btn-primary" type="">Créer un livre</button>
                    </a>
                </div>

                <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Titre</th>
                        <th>Pages</th>
                        <th>Acteur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while ($r = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <th scope="row"> <?php echo  $r['id']; ?> </th>
                            <td> <?php echo  $r['nom']; ?></td>
                            <td> <?php echo  $r['titre']; ?></td>
                            <td> <?php echo  $r['page']; ?></td>
                            <td> <?php echo  $r['auteur']; ?></td>

                            <td>
                                <a href="#">Lire</a>
                                <?php if(isset($_SESSION['username'])):?>
                                 <a href="update.php?id=<?php echo $r['id']; ?>" class="m-2">Modifier</a> 
                                 <?php endif; ?>

                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table>

        </div>


</body>
</html>