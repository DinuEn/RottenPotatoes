<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Filme</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Nume</th>
<th>Nota</th>
<th>Descriere</th>
</tr>


<?php
// Query pentru obtinerea Filmelor cu note si descriere
$sql = "SELECT Nume, AVG(Nota), Descriere FROM filme JOIN recenzie 
        ON recenzie.ID_film = filme.ID_film 
        GROUP BY Nume, Descriere";

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Nume"]. "</td><td>" . $row["AVG(Nota)"] . "</td><td>" . $row["Descriere"] . "</td><td>";
}
echo "</table>";
} else { echo "Niciun rezultat"; }
?>
</table>
</body>

<!--Buton pentru homepage-->
<a href = "home.php">
    <button type = "button">Back to home page</button>
</a>


<!--Filtrare filme in functie de nota-->
<a href = "filme_notate.php">
    <button type = "button">Afisare filme cu nota peste medie</button>
</a>

<!--Filtrare filme in functie de premii-->
<a href = "filme_premiate.php">
    <button type = "button">Afisare filme cu numar de premii peste medie</button>
</a>

<!--Cautare film-->
<a href = "cautarefilm.php">
    <button type = "button">Cauta un film</button>
</a>


</html>