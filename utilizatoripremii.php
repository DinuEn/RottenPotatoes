<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Utilizatori care au lasat recenzii la filme premiate</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Prenume</th>
<th>Nume</th>
</tr>

<h1></h1>
<!--Formular de cautare film-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="nr">Numarul premiilor minime:</label>
  <input type="text" id="nr" name="nr" required><br><br>
  <input type="submit" name="action1" value="Submit" >
</form>


<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action1'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nr = $_POST['nr'];
    }

// Query pentru obtinerea utilizatoriilor care au lasat recenzii la filme cu cel putin n premii
$sql = "SELECT utilizatori.Prenume, utilizatori.Nume FROM utilizatori JOIN recenzie
        ON recenzie.Mail = utilizatori.Mail JOIN filme
        ON recenzie.ID_film = filme.ID_film
        WHERE filme.Nume IN
        (SELECT filme.Nume FROM filme JOIN premii 
        ON filme.ID_film = premii.ID_film
        GROUP BY filme.Nume
        HAVING COUNT(premii.Nume_premiu) >= '{$nr}')
        GROUP BY utilizatori.Prenume, utilizatori.Nume";

//afisarea rezultatelor obtinute din query
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Prenume"]. "</td><td>" . $row["Nume"] . "</td><td>";
}
    echo "</table>";
} 
else { echo "Niciun rezultat"; }

}
?>
</table>
</body>

<!--Buton pentru homepage-->
<a href = "home.php">
    <button type = "button">Back to home page</button>
</a>


</html>