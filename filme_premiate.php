<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Filme Premiate</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Nume</th>
<th>Numar de premii</th>
</tr>

<?php

// Query pentru obtinerea Filmelor cu mai multe premii decat media
$sql = "SELECT filme.Nume, COUNT(*) AS count FROM premii JOIN filme
        ON filme.ID_film = premii.ID_film
        WHERE filme.ID_film = premii.ID_film
        GROUP BY filme.Nume
        HAVING count > 
        (SELECT AVG(count) FROM 
        (SELECT filme.Nume, COUNT(*) AS count FROM premii JOIN filme
        ON filme.ID_film = premii.ID_film
        GROUP BY filme.Nume) 
        AS counts)";

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Nume"]. "</td><td>" . $row["count"] . "</td><td>";
    }
    echo "</table>";
    } else { echo "Niciun rezultat"; }
?>

<!--Buton pentru intoarcere la pagina principala de filme-->
<a href = "filme.php">
    <button type = "button">Inapoi la lista filmelor</button>
</a>

</html>
