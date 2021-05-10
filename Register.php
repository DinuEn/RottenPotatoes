<?php
    include "config.php";
    //Initializarea variabilelor de logare
    $mail = $parola = $prenume = $nume = "";

    //Obtinerea variabilelor de intrare din formul de jos
    if(isset($_POST['but_submit'])){

        $mail = mysqli_real_escape_string($connection,$_POST['txt_uname']);
        $parola = mysqli_real_escape_string($connection,$_POST['txt_pwd']);
        $prenume = mysqli_real_escape_string($connection,$_POST['txt_nume']);
        $nume = mysqli_real_escape_string($connection,$_POST['txt_pnume']);
    
    //Verificarea integritatii datelor si crearea unui cont in cazul in care toate sunt prezente
    $query = "INSERT INTO utilizatori (mail, parola, nume, prenume)
    VALUES ('$mail', '$parola', '$prenume', '$nume')";
    $sqlQuery = mysqli_query($connection, $query);
    if($sqlQuery === TRUE){
        echo "<div class='form'>
            <h3>You are registered successfully.</h3><br/>
            <p class='link'>Click here to <a href='Login_page.php'>Login</a></p>
            </div>";
    }
    elseif ($sqlQuery === FALSE) echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='Register.php'>register</a> again.</p>
                </div>";
    }

?>

<!--Instructiuni pentru stilizarea paginii de register-->
<link href = "style_register.css", rel="stylesheet" type="text/css">

<!--Form cu campuri pentru introducerea datelor-->
<div id = "div_login">
    <form method = "post" action = "">
        <h1>Register</h1>
        <div>
            <input type = "text" class = "textbox" id = "txt_uname" name = "txt_uname" placeholder="Mail" />
        </div>
        <div>
            <input type = "password" class="textbox" id = "txt_uname" name = "txt_pwd" placeholder="Parola" />
        </div>
        <div>
            <input type = "text" class="Nume" id = "txt_uname" name = "txt_nume" placeholder="Nume" />
        </div>
        <div>
            <input type = "text" class="Prenume" id = "txt_uname" name = "txt_pnume" placeholder="Prenume" />
        </div>
        <div>
            <input type = "submit" value = "Create Account " name = "but_submit" id = "but_submit" />
        </div>

        <div>
            <a href = "Login_page.php"> Already have an account? Login </a> 
        </div>
        
    </form>
 </div>
