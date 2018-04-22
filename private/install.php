<?php
require_once "config.php";


// Assign file paths to PHP constants.
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("TEMPLATE_PATH", PUBLIC_PATH . '/templates');


// Open a connection via PDO to create a new database and table with structure.
try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents(PRIVATE_PATH . "/data/init.sql");
    $connection->exec($sql);
    echo '<script>console.log("DB successfully initalised")</script>';
} catch (PDOException $error) {
    echo '<script>console.log("'. $error->getMessage().'")</script>';
}
?>