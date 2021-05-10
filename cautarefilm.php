<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Cautare filme</title>
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
<!--Formular de cautare film-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="nume">Numele filmului:</label>
  <input type="text" id="nume" name="nume" required><br><br>
  <input type="submit" name="action1" value="Submit" >
</form>


<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action1'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
}

// Obtinerea filmului cu numele luat de mai sus
$sql = "SELECT Nume, AVG(Nota), Descriere FROM filme JOIN recenzie 
        ON recenzie.ID_film = filme.ID_film 
        WHERE filme.Nume = '{$nume}'
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

<!--Buton pentru intoarcere la pagina principala de filme-->
<a href = "filme.php">
    <button type = "button">Inapoi la lista filmelor</button>
</a>

</html>