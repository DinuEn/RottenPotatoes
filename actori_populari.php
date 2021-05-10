<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Actori jucati</title>
</head>

<body>
<!--Table-->    
<table>
<tr>
<th>Nume</th>
<th>Prenume</th>
<th>Numar de filme</th>
</tr>

<?php

// Query pentru obtinerea Actorilor care apar in mai multe filme decat media
$sql = "SELECT A.Nume, A.Prenume, COUNT(*) as count FROM actori A JOIN actori_filme
        ON A.ID_actor = actori_filme.ID_actor JOIN filme F
        ON F.ID_film = actori_filme.ID_film
        GROUP BY A.Nume, A.Prenume
        HAVING count >
        (SELECT AVG(count) FROM
        (SELECT A.Nume, A.Prenume, COUNT(*) as count FROM actori A JOIN actori_filme
        ON A.ID_actor = actori_filme.ID_actor JOIN filme F
        ON F.ID_film = actori_filme.ID_film
        GROUP BY A.Nume, A.Prenume) as counts)";

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Nume"]. "</td><td>" . $row["Prenume"] . "</td><td>" . $row["count"] . "</td><td>";
    }
    echo "</table>";
    } else { echo "Niciun rezultat"; }
?>

<!--Buton pentru intoarcere la pagina principala cu actori-->
<a href = "actori.php">
    <button type = "button">Inapoi la lista actorilor</button>
</a>

</html>