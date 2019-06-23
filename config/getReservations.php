<?php
session_start();

$mysqli = new mysqli("localhost", "root", "root", "le_borsalino");
$result = $mysqli->query('SELECT * FROM reservations');

if (isset($_POST['delete'])) {
    if ($_POST['delete']) {
        $mysqli->query('DELETE * FROM reservations WHERE id = ' . $_POST['id'] . '');
        header("location:reservations.php");
    }
}

echo "<table class='table'><thead><tr><th scope='col'></th><th scope='col'>Nom</th><th scope='col'>Email</th><th scope='col'>Commentaire</th><th scope='col'>Date</th><th scope='col'>Heure</th><th scope='col'>Nombre</th></tr></thead><tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td><form method='POST'><button class='btn btn-danger' name='delete' value='" . $row['id'] . "' type='submit'><i class='fa fa-close'></i></button></form></td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["comment"] . "</td><td>" . $row["date"] . "</td><td>" . $row["hour"] . "</td><td>" . $row["nb_people"] . "</td></tr>";
}
echo "</tbody></table>";
