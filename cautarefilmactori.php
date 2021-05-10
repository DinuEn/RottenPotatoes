<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Cautare filme dupa actorii care joaca in ele</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Nume</th>
<th>Nota</th>
<th>Descriere</th>
</tr>





<h1>Cauta un film</h1>
<!--Formular pentru introducerea datelor actorului-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="nume">Numele actorului:</label>
  <input type="text" id="nume" name="nume" required><br><br>
  <label for="prenume">Prenumele actorului:</label>
  <input type="text" id="prenume" name="prenume" required><br><br>
  <input type="submit" name="action1" value="Submit" >
</form>


<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action1'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
}

// Obtinerea filmelor in care joaca un actor
$sql = "SELECT filme.Nume, AVG(Nota), Descriere FROM filme JOIN actori_filme 
        ON filme.ID_film = actori_filme.ID_film JOIN actori
        ON actori_filme.ID_actor = actori.ID_ACTOR JOIN recenzie
        ON recenzie.ID_film = filme.ID_film
        WHERE actori.Nume = '{$nume}' AND actori.Prenume = '{$prenume}'
        GROUP BY Nume, Descriere";
$result = $connection->query($sql);

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Nume"]. "</td><td>" . $row["AVG(Nota)"] . "</td><td>" . $row["Descriere"] . "</td><td>";
}
echo "</table>";
} else { echo "Niciun rezultat"; }


}


?>

</table>
</body>

<!--Buton pentru intoarcere la pagina principala de actori-->
<a href = "actori.php">
    <button type = "button">Inapoi la lista actorilor</button>
</a>

</html>