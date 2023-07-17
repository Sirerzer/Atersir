<?php session_start() ?>

<!doctype html>

<html lang="fr"> 

 <head> 

  <meta charset="UTF-8"> 

  <title></title> 

  <link rel="stylesheet" href="./index.css"> 
  <link rel="stylesheet" href="../style.css"> 
 

 </head> 

 <body> <!-- partial:index.partial.html --> 
 

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 
 
<div class="signin">
    <div class="content">
        <h2>Login</h2>
        <form method="post">
            <div class="form">
                <div class="inputBox">
                    <input type="text" name="pseudo" required> <i>Username</i>
                </div>
                <div class="inputBox">
                    <input type="password" name="modepass" required> <i>Password</i>
                </div>
                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="index.php">Login</a>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Login" name="submit" id="submit">
                </div>
            </div>
        </form>    
    </div>
</div>

<?php 
    include '../serveur/database.php';
    global $conn;
    if (isset($_POST['submit'])) {
        $pseudo = $_POST['pseudo'];
        $motdepasse = $_POST['modepass'];


       $q = $conn->prepare("SELECT * FROM useri WHERE pseudo = ?");
          $q->bind_param('s', $pseudo);
          $q->execute();

       if ($q->execute()) {
    $result = $q->get_result()->fetch_assoc();
    if ($result != null) {
        $hashpassword = $result['motdepasse'];
        if (password_verify($motdepasse, $hashpassword)) {
            echo "good";
            $_SESSION['name'] = $pseudo;
        } else {
            echo "error";
        }
    } else {
        echo "erreur pseudo incorrecte";
    }
} else {
    echo "Erreur lors de l'exécution de la requête SQL.";
}
}
?>
      



      </div> 

     </div> 

    </div> 

   </div> 
</form>
  </section> <!-- partial --> 


 </body>

</html>