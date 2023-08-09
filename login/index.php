<?php 
session_start()
 ?>

<!doctype html>

<html lang="fr"> 

 <head> 

  <meta charset="UTF-8"> 

  <title></title> 

  <link rel="stylesheet" href="index.css"> 
 

 </head> 

 <body> <!-- partial:index.partial.html --> 
 
  <section> 
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
<style type="text/css"></style>
<?php 
include '../serveur/database.php';
global $conn;

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $motdepasse = $_POST['modepass'];

    $q = $conn->prepare("SELECT * FROM useri WHERE pseudo = ?");
    $q->bindValue(1, $pseudo);
    $q->execute();

    if ($q->execute()) {
        $result = $q->fetch(PDO::FETCH_ASSOC);
        if ($result != null) {
            $hashpassword = $result['motdepasse'];
            if (password_verify($motdepasse, $hashpassword)) {
                echo "good";
                $_SESSION['name'] = $pseudo;
                $_SESSION['admin'] = $result['adminlevel'];
                $_SESSION['offre'] = $result['plan'];
                echo '<meta http-equiv="refresh" content="0;url=../index.php">';
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