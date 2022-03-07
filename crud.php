<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DATABASE", "tables");

try {
    $pdo = new PDO("mysql:dbname=tables;host=localhost","root", "");

} catch (PDOException $th) {
    echo "Erro com o banco de dados: " . $th;
}
catch (Exception $th) {
    echo "Erro com o banco de dados: " . $th;
} 