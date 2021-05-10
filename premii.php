<?php
include "config.php";
?>
<html>
<!--Instructiuni pentru stilizarea tabelului-->
<link href = "filme_style.css", rel="stylesheet" type="text/css">
<head>
<title>Premii</title>
</head>

<body>
<!--Table-->
<table>
<tr>
<th>Premiu</th>
<th>Anul decernarii</th>
<th>Film</th>
</tr>


<?php
// Query pentru premii
$sql = "SELECT P.Nume_premiu, P.An_decernare, F.Nume FROM premii P JOIN filme F
        ON F.ID_film = P.ID_film";
$result = $connection->query($sql);

// Afisarea rezultatelor obtinute din query
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Nume_premiu"]. "</td><td>" . $row["An_decernare"] . "</td><td>" . $row["Nume"] . "</td><td>";
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

<!--Buton pentru cautare film in functi de premiul primit-->
<a href = "premiuprimit.php">
    <button type = "button">Cautare film in functie de premiu</button>
</a>



<h1>Premiaza un film</h1>
<!--Formular de scriere si update premiu-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="Premiu">Premiu:</label>
  <input type="text" id="Premiu" name="Premiu" required><br><br>
  <label for="Anul_decernarii">Anul decernarii:</label>
  <input type="text" id="Anul_decernarii" name="Anul_decernarii" required><br><br>
  <label for="Film:">Film:</label>
  <input type="text" id="Film" name="Film" required><br><br>
  <input type="submit" name="action1" value="Submit" >
</form>


<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action1'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $premiu = $_POST['Premiu'];
    $an = $_POST['Anul_decernarii'];
    $film = $_POST['Film'];  
}

// Obtinerea filmului cu numele luat de mai sus
$sql = "SELECT ID_film FROM filme
        WHERE Nume = '{$film}'";
$result = $connection->query($sql);
while($row = $result->fetch_assoc()) {
    $ID_film = $row["ID_film"];
}

//Inserarea unui premiu / Update in cazul in care premiul deja exista
$sql = "INSERT INTO premii (ID_film, Nume_premiu, An_decernare) 
        VALUES ('{$ID_film}','{$premiu}','{$an}')
        ON DUPLICATE KEY 
        UPDATE ID_film = '{$ID_film}', Nume_premiu = '{$premiu}', An_decernare = '{$an}'";
$connection -> query($sql);
}
?>


<h1>Anuleaza un premiu</h1>
<!--Formular de stergere premiu-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="Premiu">Premiu:</label> 
  <input type="text" id="Premiu" name="Premiu" required><br><br>
  <label for="Anul_decernarii">Anul decernarii:</label>
  <input type="text" id="Anul_decernarii" name="Anul_decernarii" required><br><br>
  <input type="submit" name="action2" value="Delete" >
</form>
<?php

// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action2'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $premiu = $_POST['Premiu'];
    $an = $_POST['Anul_decernarii'];
}

// Stergerea unui premiu din anul respectiv
$sql = "DELETE FROM premii 
        WHERE Nume_premiu = '{$premiu}' AND An_decernare =  '{$an}'";
$connection -> query($sql);
}
?>


</html>