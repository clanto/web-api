<?php
function searchIPInARIN($ip) {
    $url = "https://rdap-bootstrap.arin.net/bootstrap/ip/$ip";
    $response = file_get_contents($url);
    
    if ($response !== false) {
        echo $response . "\n";
    } else {
        echo "Impossibile ottenere informazioni per l'IP $ip dal registro ARIN tramite RDAP\n";
    }
}

if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    searchIPInARIN($ip);
} else {
    echo "Specificare un indirizzo IP utilizzando il parametro 'ip' nella query GET.";
}
?>
