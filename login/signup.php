<!DOCTYPE html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>Sign up</title> 

  <link rel="stylesheet" href="./index.css"> 

 </head> 

 <body> <!-- partial:index.partial.html --> 

  <section> 


 <div class="signin">

    <div class="content">
    	
        <h2>Sign up</h2>
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
                    <input type="submit" value="Sign Up" name="submit" id="submit">
                </div>
           

         </form>    
        </div>

    </div>
  

</div>
       <?php 
     
           include '../serveur/database.php';
    		global $conn;
            if (isset($_POST['submit'])) {
                $pseudo = $_POST['pseudo'];
               
                $motdepasse = $_POST['modepass'];
				$options = [
    				'cost' => 12,
    			];
     			$mdt = password_hash($motdepasse, PASSWORD_BCRYPT, $options);


                $q = $conn->prepare("INSERT INTO useri (pseudo, email, motdepasse) VALUES (?,  ?)");
                $q->bind_param("sss", $pseudo, $mdt);


                if ($q->execute()) {
                    echo "Data inserted successfully!";
                    mkdir('../'.$pseudo ,777);
                    echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
                } else {
                    echo "Error: " . $q->error;
                }
            }
           
?>

