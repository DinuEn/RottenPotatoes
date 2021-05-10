<?php
include "config.php";

// Obtinerea variabilelor de intrare din formul de jos
if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($connection,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($connection,$_POST['txt_pwd']);

    // Verificare integritatii datelor introduse si existentei unui utilizator cu datele prezente
    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as user from utilizatori where mail='".$uname."' and parola='".$password."'";
        $result = mysqli_query($connection,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['user'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
            exit;
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<!--Instructiuni pentru stilizarea paginii de login-->
<link href = "style_login.css", rel="stylesheet" type="text/css">

<!--Form cu campuri pentru introducerea datelor-->
<div class = "container">
    <form method = "post" action = "">
        <div id = "div_login">
            <h1>Login</h1>
            <div>
                <input type = "text" class = "textbox" id = "txt_uname" name = "txt_uname" placeholder="Mail" />
            </div>
            <div>
                <input type = "password" class="textbox" id = "txt_uname" name = "txt_pwd" placeholder="Parola" />
            </div>
            <div>
                <input type = "Submit" value = "submit" name = "but_submit" id = "but_submit" />
            </div>

            <div>
                <a href = "Register.php" > Don't have an account? Register </a>
            </div>
        </div>
    </form>
</div>