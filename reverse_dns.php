<?php
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];

    // Verifica che l'input sia un indirizzo IP valido
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        $hostname = gethostbyaddr($ip);

        // Verifica se il lookup ha avuto successo
        if ($hostname !== $ip) {
            echo $hostname;
        } else {
            echo "Non è stato possibile trovare un hostname per l'IP $ip.";
        }
    } else {
        echo "Indirizzo IP non valido.";
    }
} else {
    echo "Per favore, fornisci un indirizzo IP come parametro GET.";
}
?>