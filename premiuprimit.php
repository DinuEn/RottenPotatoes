<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Cautare filme dupa premii</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Nume</th>
<th>Nota</th>
<th>Descriere</th>
</tr>


<h1>Cauta un film dupa premiile primite</h1>
<!--Formular de cautare film-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="nume">Numele premiului:</label>
  <input type="text" id="nume" name="nume" required><br><br>
  <label for="an">Anul decernarii:</label>
  <input type="text" id="an" name="an" required><br><br>
  <input type="submit" name="action1" value="Submit" >
</form>


<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action1'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $an = $_POST['an'];
}

// Obtinerea filmului cu premiul de mai sus
$sql = "SELECT P.Nume_premiu, P.An_decernare, F.Descriere, F.Nume, AVG(Nota) FROM premii P JOIN filme F
        ON F.ID_film = P.ID_film JOIN recenzie R
        ON R.ID_film = F.ID_film
        WHERE '{$nume}' = Nume_premiu AND '{$an}' = An_decernare";
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

<!--Buton pentru intoarcere la pagina principala de premii-->
<a href = "premii.php">
    <button type = "button">Inapoi la lista premiilor</button>
</a>

</html>