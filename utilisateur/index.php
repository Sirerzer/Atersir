<?php
session_start();

// Function to handle server click
function handleServerClick($clickedServer)
{  
     
    // Add your logic here to handle the clicked server
$_SESSION['serveurselecte'] = $clickedServer;
echo $_SESSION['serveurselecte'] ;
}

echo "<div>";
$path_serveur = '../serveur/' . $_SESSION['name'];
$serveurn = 0;
if ($handle = opendir($path_serveur)) {
    while (($entry = readdir($handle)) !== false) {
        if ($entry !== '.' && $entry !== '..') {
            echo '<form method="POST" class="serveur">
                  <br>
                    <h1>&nbsp;&nbsp;' . $entry . '</h1>
                    <button type="submit" class=button name="server_name"  value=' . $entry . '><a href="console/index.php">Manege</a></button>
                  </form>
                  <br>', PHP_EOL;
            ($serveurn++);
        }
    }
    closedir($handle);
}
echo "</div>";
?>

<style type="text/css">
    /* Your CSS styles here... */
</style>

<form method="POST">
    <input type="text" name="str1">
    <input type="submit" name="ss" value="+ Creé">
</form>

<?php  
if (isset($_POST["ss"])) {
    $sum = $_POST["str1"];
    if (empty($sum)) {
        echo '';
        echo '<footer class="warn"><br/>veuillez donner un nom à votre serveur</footer>';
    } else {
        if ($_SESSION['offre'] == "free") {
            if ($serveurn == 3) {
                echo '<footer class="warn"><br/>vous avez atteint la limite de serveurs du plan gratuit</footer>';
            } else {
                echo "serveur créé";
                echo '';
                mkdir('../serveur/' . $_SESSION['name'] . '/' . $sum, 0777, true);
                file_put_contents('run.sh', 'java -Xmx4096M -Xms2048M -jar server.jar');
            }
        }
    }
}

if (isset($_POST["server_name"])) {
    $clickedServer = $_POST["server_name"];
    $_SESSION['serveurselecte'] = $clickedServer;
    handleServerClick($clickedServer);
}
?>
<style type="text/css">
    .serveur{
        background: indianred;
        border: solid ,1px;
        border-radius: 12px;
        margin-left: auto;
        margin-right: auto;
        margin-top: auto;
        margin-bottom: auto;
    }
    .footer{
        background: red;
        Text-decorarion: bold;
    }
    .button{
        text-align: center;
        margin-left: 0;
        margin-right: auto;
        margin-top: auto;
        margin-bottom: auto;
    }
</style>
<br/>