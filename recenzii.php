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
<th>Film</th>
<th>Nume</th>
<th>Prenume</th>
<th>Nota</th>
<th>Comentariu</th>
</tr>

<?php

// Query pentru obtinerea Recenziilor
$sql = "SELECT F.Nume AS 'Nume_film', U.Nume, U.Prenume, R.Nota, R.Comentariu 
        FROM utilizatori U JOIN recenzie R
        ON U.Mail = R.Mail JOIN filme F ON R.ID_film = F.ID_film";
$result = $connection->query($sql);

// Afisarea rezultatelor obtinute din query
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>". $row["Nume_film"] . "</td><td>" . $row["Nume"]. "</td><td>" . $row["Prenume"] . "</td><td>"  . $row["Nota"] . "</td><td>" . $row["Comentariu"] . "</td><td>";
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

<!--Buton pentru sortarea utilizatorilor care au lasat recenzii la macar n filme-->
<a href = "utilizatoripremii.php">
    <button type = "button">Utilizatori care au lasat recenzii la filme premiate</button>
</a>

<h1>Write your opinion!</h1>
<!--Formular de scriere si update review-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="E-mail">E-mail:</label>
  <input type="text" id="E-mail" name="E-mail" required><br><br>
  <label for="Movie-Name">Movie Name:</label>
  <input type="text" id="Movie-Name" name="Movie-Name" required><br><br>
  <label for="Comment:">Comment:</label>
  <input type="text" id="Comment" name="Comment" required><br><br>
  <label for="Nota:">Nota:</label>
  <input type="number" id="Nota" name="Nota" required><br><br>
  <input type="submit" name="action1" value="Submit" >
</form>


<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action1'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['E-mail'];
    $movie = $_POST['Movie-Name'];
    $comment = $_POST['Comment'];
    $nota = $_POST['Nota'];   
}

// Obtinerea filmului cu numele luat de mai sus
$sql = "SELECT ID_film FROM filme
        WHERE Nume = '{$movie}'";
$result = $connection->query($sql);
while($row = $result->fetch_assoc()) {
    $ID_film = $row["ID_film"];
}

//Inserarea unei recenzii si update in cazul in care userul a mai lasat o recenzie pentru acelasi film
$sql = "INSERT INTO recenzie (ID_film, Mail, Nota, Comentariu) 
        VALUES ('{$ID_film}','{$email}','{$nota}','{$comment}')
        ON DUPLICATE KEY 
        UPDATE Nota = '{$nota}', Comentariu = '{$comment}'";
$connection -> query($sql);
}
?>




<h1>Delete existing review</h1>
<!--Formular de stergere review-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
  <label for="E-mail">E-mail:</label>
  <input type="text" id="E-mail" name="E-mail" required><br><br>
  <label for="Movie-Name">Movie Name:</label>
  <input type="text" id="Movie-Name" name="Movie-Name" required><br><br>
  <input type="submit" name="action2" value="Delete" >
</form>

<?php
// Salvarea variabilelelor luate din form-ul de mai sus
if(isset($_POST['action2'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['E-mail'];
    $movie = $_POST['Movie-Name'];
}

// Obtinerea filmului cu numele luat de mai sus
$sql = "SELECT ID_film FROM filme
        WHERE Nume = '{$movie}'";
$result = $connection->query($sql);
while($row = $result->fetch_assoc()) {
    $ID_film = $row["ID_film"];
}

//Stergerea unei recenzii pentru utilizatorul si filmul respectiv
$sql = "DELETE FROM recenzie 
        WHERE Mail = '{$email}' AND ID_film =  '{$ID_film}'";
$connection -> query($sql);
}
?>
</html>
