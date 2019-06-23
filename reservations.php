<?php
include('config/head.php');

$mysqli = new mysqli("localhost", "root", "root", "le_borsalino");

if (isset($_POST["actu_title"])) {
    if (
        $_POST["actu_title"] != ""
    ) {
        $mysqli->query('INSERT INTO `actuality`(`name`) VALUES ("' . $_POST['actu_title'] . '")');
    } else {
        echo "<div id=\"erreur_connection\">Remplissez tout les champs</div>";
    }
}
?>
<div class="container">
    <h1>Réservations <a href="config/logout.php" class="btn btn-danger">Déconnexion</a></h1>
    <?php include('config/getReservations.php'); ?>
    <hr>
    <h1>Actualités</h1>
    <?php include('config/actualities.php'); ?>
    <br>
    <form method="POST">
        <div class="row">
            <div class="col-lg-10">
                <input name="actu_title" class="form-control" type="text" placeholder="Ajouter une actualité">
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-block btn-success">Ajouter</button>
            </div>
        </div>
    </form>

</div>