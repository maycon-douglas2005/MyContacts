<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use PROJETO\Models\Usuario; // opcional, apenas pra clareza

session_start();

echo $_SESSION['Usuario'];
