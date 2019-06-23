<?php 
    session_start();

	$mysqli = new mysqli("localhost", "root", "root", "le_borsalino");
    $result = $mysqli->query('SELECT * FROM actuality');
			
    echo "<ul class='list-group'>";
    while($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>".$row["name"]."</li>";
    }
    echo "</ul>";
?>