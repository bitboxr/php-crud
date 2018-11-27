<?php

// Configure this to your own server database settings
$host = "localhost";
$user = "root";
$dbname = "timetracker";
$pass = "";

try {
    // PDO Object
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // This tells PDO that all errors should be handled as an Exception (No matter what error occurs) so we can catch it and fix it
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    echo "Line: " . $e->getLine() . "<BR>";
    echo "Message: " . $e->getMessage();
    exit();
}