<?php
require_once __DIR__ . "/../Config/Database.php";

use Config\Database;

$conn = Database::getConn();
echo "Sukses membuat koneksi database";