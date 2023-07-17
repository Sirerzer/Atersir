<?php
function tail($filepath, $lines = 10) {
    $output = shell_exec('tail -n ' . $lines . ' ' . $filepath);
    return $output;
}

        $logFilePath = "C:\xampp\htdocs\utilisateur\Sir_200\Lobby\logs\latest.log"; // Remplacez par le chemin réel vers le fichier de logs

echo "Logs Spigot en temps réel:<br><br>";

// Rafraîchir les logs toutes les secondes
$refreshInterval = 10;
while (true) {
    $logs = tail($logFilePath);
    echo nl2br(htmlspecialchars($logs));

    // Flush et envoie les données au navigateur
    flush();

    // Attendre avant le prochain rafraîchissement
    sleep($refreshInterval);
}
?>
