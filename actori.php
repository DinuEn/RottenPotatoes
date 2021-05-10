<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Actori</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Prenume</th>
<th>Nume</th>
</tr>


<?php

// Query pentru obtinerea Actorilor cu nume si prenume
$sql = "SELECT Prenume, Nume FROM actori";

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Prenume"]. "</td><td>" . $row["Nume"] . "</td><td>" ;
}
echo "</table>";
} else { echo "Niciun rezultat"; }
?>
</table>
</body>

<!--Buton pentru intoarcere la pagina principala-->
<a href = "home.php">
    <button type = "button">Back to home page</button>
</a>

<!--Filtrare actori in functie de numarul de filme-->
<a href = "actori_populari.php">
    <button type = "button">Afisarea actorilor care au jucat in medie in mai multe filme decat ceilalti</button>
</a>

<!--Cauta filmele in care a jucat un actor-->
<a href = "cautarefilmactori.php">
    <button type = "button">Afisarea filmelor in care apare un actor</button>
</a>

</html>