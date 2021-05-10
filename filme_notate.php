<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Filme Notate</title>
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

// Query pentru obtinerea Filmelor cu nota mai mare decat media
$sql = "SELECT filme.Nume, AVG(Nota), filme.Descriere FROM filme JOIN recenzie 
        ON recenzie.ID_film = filme.ID_film 
        GROUP BY filme.Nume, filme.Descriere
        HAVING AVG(Nota) > (SELECT AVG(R.Nota) FROM recenzie R)";

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Nume"]. "</td><td>" . $row["AVG(Nota)"] . "</td><td>" . $row["Descriere"] . "</td><td>";
    }
    echo "</table>";
    } else { echo "Niciun rezultat"; }
?>

<!--Buton pentru intoarcere la pagina principala de filme-->
<a href = "filme.php">
    <button type = "button">Inapoi la lista filmelor</button>
</a>

</html>