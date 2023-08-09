 <form method="post">

    <input type="text" name="find" required>
    <input type="submit" name="ze" id="ze"><br>
</form>
<?php
if (isset($_POST['ze'])) {
    include '../serveur/database.php';
    global $conn;
    
    $find = $_POST['find']; // Récupérer la valeur saisie dans le champ de saisie

    // Utilisation de requêtes préparées pour éviter les problèmes de sécurité et les erreurs de syntaxe
    $stmt = $conn->prepare("SELECT * FROM usera WHERE pseudo = ?");
    $stmt->bind_param("s", $find);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($user = $result->fetch_assoc()) {
        echo "| id: " . $user['id'] . " | pseudo: " . $user['pseudo'] . " | email: " . $user['email'] . "<hr/>";


    }

    $stmt->close();
}
?>


<?php 
include '../serveur/database.php';
global $conn;
$q = $conn->query("SELECT * FROM usera");
while ($user = $q->fetch_assoc()){
	echo "| id: ".$user['id'] ." | pseudo: ". $user['pseudo']. " | email: ".$user['email'] . "<hr/>";
}


?>