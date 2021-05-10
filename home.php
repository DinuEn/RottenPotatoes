<?php
    include "config.php";

    //Verifica logarea utilizatorului
    if(!isset ($_SESSION['uname'])){
       header('Location: Login_page.php');
       exit;
    }

?>

<!doctype html>
<title>Homepage</title>
<!--Instructiuni pentru stilizarea homepage-ului-->
<link href = "style_home.css", rel="stylesheet" type="text/css">

<div class = "container">
    <p>Homepage
    <a href = "Login_page.php" > Logout </a>
    </p>
</div>
<p>Successful login!</p>

<!--Linkuri catre paginile website-ului-->
<a href = "filme.php">
    <button type = "button">Filme</button>
</a>

<a href = "actori.php">
    <button type = "button">Actori</button>
</a>

<a href = "recenzii.php">
    <button type = "button">Recenzii</button>
</a>

<a href = "premii.php">
    <button type = "button">Premii</button>
</a>
