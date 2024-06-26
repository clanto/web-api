<?php

function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // `HTTP_X_FORWARDED_FOR` può contenere una lista di IP separati da virgola
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ipList[0]);
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Valida l'IP
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        return $ip;
    } else {
        return 'IP non valido';
    }
}

// Esempio di utilizzo
echo getRealIpAddr();

?>