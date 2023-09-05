<?php
require_once 'connecte.php';

        $id = $_GET['id'];
        $selSql = "SELECT * FROM `livres` WHERE id = $id";
        $res = mysqli_query($con, $selSql);
        $r =  mysqli_fetch_assoc($res);


    if (isset($_POST) && !empty($_POST)) {
        $nom = ($_POST['nom']);
        $titre = ($_POST['title']);
        $page = ($_POST['page']);
        $acteur = ($_POST['actor']);

        $updateSql = "UPDATE `livres` SET nom='$nom', titre='$titre', page='$page', auteur='$acteur'  WHERE id=$id";

        $res = mysqli_query($con, $updateSql);

        if($res) {
               header("location: vue.php");
        }else {
            $erreur = "La mise à jour à échoué ";
        }
    }

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
  ?>

<div class="container">
            <div class="row pt-4">

                        <?php if (isset($erreur)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $erreur; ?>
                        </div> <?php } ?>
                  <form action=" " method="POST" class="form-horizontal col-md-6 pt-4">
                      <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" class="form-control" value="<?php echo $r['nom'] ?>">
                            </div>
                      </div>

                      <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Titre</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="<?php echo $r['titre']?>" >
                            </div>
                      </div>

                      <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Pages</label>
                            <div class="col-sm-10">
                                <input type="number" name="page" class="form-control" value="<?php echo $r['page'] ?>">
                            </div>
                      </div>

                      <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Auteur</label>
                            <div class="col-sm-10">
                                <input type="text" name="actor" class="form-control" value="<?php echo $r['auteur']?>" >
                              </div>
                      </div>

                      <div class="pt-4">
                        <input type="submit" value="submit" class="btn btn-primary m-3">
                      </div>

                  </form>
             </div>
      </div>

</body>
</html>