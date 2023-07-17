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


                    $q = $conn->prepare("SELECT * FROM useri WHERE pseudo = :pseudo:");
                    $q->execute(['pseudo' => $pseudo]);
                    $result = $q->fetch();
                    var_dump($result);
                    if($result == true){

                    }
                    else{
                         echo "ereure pseudo incorecte";
                         
                    }

              
          }
           
?>