<?php
// File: visit_counter.php
$counter_file = 'visite.txt';
$ip_file = 'visite_ip.json';
$date = date('Y-m-d');
$ip = $_SERVER['REMOTE_ADDR'];

// Carica la lista degli IP visitatori
if (file_exists($ip_file)) {
    $ip_data = json_decode(file_get_contents($ip_file), true);
    if (!is_array($ip_data)) $ip_data = [];
} else {
    $ip_data = [];
}

// Inizializza il contatore se non esiste
if (!file_exists($counter_file)) {
    file_put_contents($counter_file, '0');
}
$visite = (int)file_get_contents($counter_file);

// Verifica se l'IP ha già visitato oggi
if (!isset($ip_data[$date])) {
    $ip_data[$date] = [];
}
if (!in_array($ip, $ip_data[$date])) {
    $visite++;
    file_put_contents($counter_file, $visite);
    $ip_data[$date][] = $ip;
    // Mantieni solo gli ultimi 3 giorni per non far crescere troppo il file
    $ip_data = array_slice($ip_data, -3, null, true);
    file_put_contents($ip_file, json_encode($ip_data));
}

header('Content-Type: application/json');
echo json_encode(['visite' => $visite]);
